<?php
require(__DIR__ . "/../partials/nav.php");
is_logged_in(true);
?>

<h1>Withdraw Funds:</h1>

<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="account">Choose Account for Withdrawl:</label>
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
            <option value="<?php $accountNum ?>"> <?php echo $accountNum . " : " . $balance; ?> </option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="amount">Choose Amount to Withdraw</label>
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
        $amount = (int)se($_POST, "amount", "", false);
        echo $accountNum;
        if (isset($_POST["memo"])){
            $memo = se($_POST, "memo", "", false);
        }
        $hasError = false;
        $db = getDB();
        //get current balance of world and get acocunt id for withdrawal
        if (!$hasError){
            $stmt = $db->prepare("SELECT balance FROM Account WHERE userID = :userID");
            $stmt2 = $db->prepare("SELECT id FROM User WHERE email = :email");
            try{
                $stmt->execute([":userID" => -1]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                $currentBalance = (int)$result->balance;
                $stmt2->execute([":email"=>get_user_email()]);
                $result = $stmt2->fetch(PDO::FETCH_OBJ);
                //print_r($result);
                $accountId = $result->id;
                //echo $accountId;
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
            //update balance of world
            $updateBalance = $currentBalance + $amount;
            $stmt = $db->prepare("UPDATE Account SET balance = :balance WHERE userID = :userID");
            try{
                $stmt->execute([":balance"=>$updateBalance, ":userID"=>-1]);
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        }
        /////////////MUST UPDATE BALANCE OF CHECKING ACCOUNT AFTER MAKING WITHDRAWAL
        if ($hasError){
            
        }
        /////////////MUST UPDATE BALANCE OF CHECKING ACCOUNT AFTER MAKING WITHDRAWAL

        //create transaction pair for withdrawal
        if (!$hasError){
            $stmt1 = $db->prepare("INSERT INTO Transactions (accountSrc, accountDest, balanceChg, transType, memo, expectedTotal) 
                                    VALUES (:accountSrc, :accountDest, :balanceChg, :transType, :memo, :expectedTotal)");
            try{
                $stmt1->execute([":accountSrc" => -1, ":accountDest" => get_user_id(), ":balanceChg" => (-1 * $amount), 
                                    ":transType" => "withdraw", ":memo" => "", ":expectedTotal" => ($updateBalance)]);
            }catch(Exception $e) {
                users_check_duplicate($e->errorInfo);
            }
        }
        if (!$hasError){
            $stmt2 = $db->prepare("INSERT INTO Transactions (accountSrc, accountDest, balanceChg, transType, memo, expectedTotal) 
                                    VALUES (:accountSrc, :accountDest, :balanceChg, :transType, :memo, :expectedTotal)");
            try{
                $stmt2->execute([":accountSrc" => get_user_id(), ":accountDest" => -1, ":balanceChg" => ($amount),
                                    ":transType" => "withdraw", ":memo" => "withdraw from account " . $accountId, ":expectedTotal" => ($amount)]);
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        }
    }
    
?>


<?php
    require(__DIR__ . "/../partials/flash.php");
?>