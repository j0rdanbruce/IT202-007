<?php
require(__DIR__ . "/../partials/nav.php");
is_logged_in(true);
?>

<h1>Deposit Funds:</h1>

<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="account">Choose Account for Deposit:</label>
        <select name="account" id="account">
            <option value=""></option>
            <?php
                $db = getDB();
                $stmt = $db->prepare("SELECT accountNum, balance FROM Account WHERE userID = :userID");
                $stmt->execute([":userID"=>get_user_id()]);
                while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $accountNum = $result['accountNum'];
                    $balance = $result['balance'];
            ?>
            <option value="<?php echo $accountNum;?>"> <?php echo $accountNum . " : " . $balance; ?> </option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="amount">Choose Amount to Deposit</label>
        <input type="number" name="amount" required />
    </div>
    <div>
        <label for="memo">Memo:</label>
        <input type="text" name="memo" maxlength="100" placeholder="Not Required" />
    </div>

    <input type="submit" value="Submit" />
</form>

<?php
    if (isset($_POST["account"]) && isset($_POST["amount"])){
        $accountNum = se($_POST, "account", "", false);
        $worldAccount = "000000000000";
        $amount = (int)se($_POST, "amount", "", false);
        //echo $accountNum;
        if (isset($_POST["memo"])){
            $memo = se($_POST, "memo", "", false);
        }
        $hasError = false;
        $db = getDB();
        //check for sufficient funds
        if (!$hasError){
            $stmt = $db->prepare("SELECT accountNum, balance FROM Account WHERE accountNum = :account");
            $stmt->execute([":account"=>$accountNum]);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            $currentBalance = $result->balance;
            if ($amount < 0){
                $hasError = true;
                flash("Cannot deposit a negative amount", "warning");
            }
        }
        //grabbing ids and updating balances of respective accounts
        if (!$hasError){
            $stmt1 = $db->prepare("SELECT id, accountNum, balance FROM Account WHERE accountNum = :account");
            $stmt2 = $db->prepare("UPDATE Account SET balance = :balance WHERE accountNum = :account");
            try{
                $stmt1->execute([":account"=>$accountNum]);
                $result = $stmt1->fetch(PDO::FETCH_OBJ);
                $depositID = (int)$result->id;
                $currentDBalance = (int)$result->balance;
                //echo $currentWBalance;
                $stmt1->execute([":account"=>$worldAccount]);
                $result = $stmt1->fetch(PDO::FETCH_OBJ);
                $currentWorldBalance = (int)$result->balance;
                $updatedDBalance = $currentBalance + $amount;
                $updatedWorldBalance = $currentWorldBalance - $amount;
                //echo "updated withdraw balance is " . $updatedWBalance;
                //echo "updated world balance is " . $updatedWorldBalance;
                $stmt2->execute([":balance"=>$updatedDBalance, ":account"=>$accountNum]);
                $stmt2->execute([":balance"=>$updatedWorldBalance, ":account"=>$worldAccount]);
                flash("successfully deposited funds to Account Number: " . $accountNum, "success");
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        }
        //make transaction pair
        if (!$hasError){
            $stmt1 = $db->prepare("INSERT INTO Transactions (accountSrc, accountDest, balanceChg, transType, memo, expectedTotal) 
                                    VALUES (:accountSrc, :accountDest, :balanceChg, :transType, :memo, :expectedTotal)");
            try{
                $stmt1->execute([":accountSrc" => -1, ":accountDest" => $depositID, ":balanceChg" => (-1 * $amount), 
                                    ":transType" => "deposit", ":memo" => "", ":expectedTotal" => ($updatedWorldBalance)]);
                $stmt1->execute([":accountSrc" => $depositID, ":accountDest" => -1, ":balanceChg" => ($amount), 
                                    ":transType" => "deposit", ":memo" => "deposit to acct" . $depositID, 
                                    ":expectedTotal" => ($updatedDBalance)]);
            }catch(Exception $e) {
                users_check_duplicate($e->errorInfo);
            }
            die(header("Location: accounts.php"));
        }
    }
    
?>


<?php
    require(__DIR__ . "/../partials/flash.php");
?>