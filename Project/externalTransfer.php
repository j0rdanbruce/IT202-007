<?php
require(__DIR__ . "/../partials/nav.php");
is_logged_in(true);
?>

<h1>External Transfer</h1>

<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="account">Choose Account to Withdraw from:</label>
        <select name="wAccount" id="wAccount">
            <option value=""></option>
            <?php
                $db = getDB();
                $stmt = $db->prepare("SELECT accountNum, balance FROM Account WHERE userID = :userID");
                $stmt->execute([":userID"=>get_user_id()]);
                while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $wAccountNum = $result['accountNum'];
                    $balance = $result['balance'];
            ?>
            <option value="<?php echo $wAccountNum; ?>"> <?php echo $wAccountNum . " : " . $balance; ?> </option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="userDest">Type in Last Name of Person you want to transfer money:</label>
        <input type="text" name="userLastName" required />
    </div>
    <div>
        <label for="userDest">Last 4 Digits of Person's Checking Account:</label>
        <input type="text" name="last4Digits" required />
    </div>
    <div>
        <label for="amount">Choose Amount to Transfer</label>
        <input type="number" name="amount" required />
    </div>
    <div>
        <label for="memo">Memo:</label>
        <input type="text" name="memo" maxlength="100" placeholder="Not Required" />
    </div>

    <input type="submit" name="submit" value="Submit" />
</form>


<?php
    if (isset($_POST["wAccount"]) && isset($_POST["userLastName"]) && isset($_POST["last4Digits"])
        && isset($_POST["amount"]) && isset($_POST["submit"])){
        $wAccountNum = strval($_POST["wAccount"]);
        $lastName = strval(se($_POST, "userLastName", "", false));
        $accountDigits = strval(se($_POST, "last4Digits", "", false));
        $amount = (int)se($_POST, "amount", "", false);
        if (isset($_POST["memo"])){
            $memo = se($_POST, "memo", "", false);
        }
        //echo $lastName;
        $hasError = false;
        $db = getDB();

        if (!$hasError){
            //check if transfer amount is more than the withdraw account balance
            $stmt = $db->prepare("SELECT id, accountNum, balance FROM Account WHERE accountNum = :accountNum");
            try{
                $stmt->execute([":accountNum"=>$wAccountNum]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                $balance = (int)$result->balance;
                //$id = $result->id;
                //echo "account id is " . $id;
                if ($balance < $amount){
                    $hasError = true;
                    flash("withdraw amount is greater than whats in withdrawal account", "warning");
                }
                if ($amount < 0){
                    $hasError = true;
                    flash("cannot enter a negative amount for external transfer", "warning");
                }
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        }
        //make external transfer here
        if (!$hasError){
            //echo "here";
            $stmt = $db->prepare("SELECT id, lastName FROM User WHERE lastName = :lastName ");
            try{
                $stmt->execute([":lastName"=>$lastName]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                if (!$result){
                    $hasError = true;
                    flash("There is no one with this last name affiliated with this bank.", "warning");
                }else{
                    $userID = (int)$result->id;
                    //echo $userID;
                }
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        }
        //updating acocunt balnaces of respective users
        if(!$hasError){
            $stmt = $db->prepare("SELECT id, accountNum, userID, balance FROM Account
                WHERE accountNum LIKE '%$accountDigits'");
            $stmt2 = $db->prepare("UPDATE Account SET balance = :balance WHERE accountNum = :accountNum");
            $stmt3 = $db->prepare("SELECT id, accountNum, balance FROM Account WHERE accountNum = :accountNum");
            //$stmt4 = $db->prepare("");
            try{
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                if (!$result){
                    $hasError = true;
                    flash("Incorrect Last 4 Digits of the checking Account for " . $lastName, "warning");
                }else{
                    //withdrawing user stuff
                    $depositID = (int)$result->id;
                    $stmt3->execute([":accountNum"=>$wAccountNum]);
                    $result2 = $stmt3->fetch(PDO::FETCH_OBJ);
                    $withdrawID = (int)$result2->id;
                    $currentWBalance = (int)$result2->balance;
                    $updatedWBalance = $currentWBalance - $amount;

                    $accountNum = $result->accountNum;
                    $currentBalance = (int)$result->balance;
                    $updatedBalance = $currentBalance + $amount;
                    //echo $accountNum;
                    $stmt2->execute([":balance"=>$updatedBalance, ":accountNum"=>$accountNum]);
                    $stmt2->execute([":balance"=>$updatedWBalance, ":accountNum"=>$wAccountNum]);
                    flash("Successfully transferred $ " . $amount . " to Account: " . $accountNum . " of " . $lastName, "success");
                }
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        }
        //make transaction pair here
        if (!$hasError){
            $stmt1 = $db->prepare("INSERT INTO Transactions (accountSrc, accountDest, balanceChg, transType, memo, expectedTotal) 
                                    VALUES (:accountSrc, :accountDest, :balanceChg, :transType, :memo, :expectedTotal)");
            try{
                $stmt1->execute([":accountSrc" => $withdrawID, ":accountDest" => $depositID, ":balanceChg" => (-1 * $amount), 
                                    ":transType" => "transfer", ":memo" => "", ":expectedTotal" => ($updatedWBalance)]);
                $stmt1->execute([":accountSrc" => $depositID, ":accountDest" => $withdrawID, ":balanceChg" => ($amount), 
                                    ":transType" => "ext. transfer", ":memo" => "ext. trans to acct" . $depositID . " from acct" . $withdrawID, 
                                    ":expectedTotal" => ($updatedBalance)]);
            }catch(Exception $e) {
                users_check_duplicate($e->errorInfo);
            }
        }
    }
?>


<?php
    require(__DIR__ . "/../partials/flash.php");
?>