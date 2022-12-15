<?php
require(__DIR__ . "/../partials/nav.php");
is_logged_in(true);
?>

<script>
    
</script>

<h1>Create a Checking Account: </h1>

<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="deposit">Initial Deposit:</label>
        <input type="number" name="deposit" required placeholder="e.g. 10"/>
    </div>
    <input type="submit" value="Submit" />
</form>

<?php
    if (isset($_POST["deposit"])){
        $deposit = (int)se($_POST, "deposit", "", false);
        $hasError = false;
        $db = getDB();
        $accntNum = randAccntGen(12);
        $stmt = $db->prepare("SELECT accountNum FROM Account WHERE accountNum = :accountNum");
        try{
            $stmt->execute([":accountNum" => $accntNum]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
        }catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
        
        while (!empty($result)){
            $accntNum = randAccntGen(12);
            $stmt->execute([":accountNum" => $accntNum]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        if ($deposit < 10){
            flash("Initial deposit must be at least $10", "warning");
            $hasError = true;
        }

        if (!$hasError){
            $stmt = $db->prepare("INSERT INTO Account (accountNum, userID, balance, accountType) VALUES(:accountNum, :userID, :balance, :accountType)");
            try{
                $stmt->execute([":accountNum" => $accntNum, ":userID" => get_user_id(), ":balance" => $deposit, ":accountType" => "checking"]);
            }catch (Exception $e) {
                users_check_duplicate($e->errorInfo);
            }
        }

        //get current balance of world
        if (!$hasError){
            $stmt = $db->prepare("SELECT balance FROM Account WHERE userID = :userID");
            try{
                $stmt->execute([":userID" => -1]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                $currentBalance = $result->balance;
                var_dump((int)$currentBalance);
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        }
        
        /*if (!$hasError){
            $stmt = $db->prepare("INSERT INTO Transactions (accountSrc, accountDest, balanceChg, transType, memo, expectedTotal) 
                                    VALUES (:accountSrc, :accountDest, :balanceChg, transType, :memo, :expectedTotal)");
            try{
                $stmt->execute([":accountSrc" => -1, ":accountDest" => get_user_id(), ":balanceChg" => (-1 * $deposit), 
                                    ":transType" => "create", ":memo" => "", ":expectedTotal" => (-1 * $deposit)]);
            }catch(Exception $e) {
                users_check_duplicate($e->errorInfo);
            }
        }*/
        flash("Successfully Registered for Checking Account! '\n'Funds have been added to your checking account.", "success");
        //die(header("Location: accounts.php"));
    }
?>

<?php
    require(__DIR__ . "/../partials/flash.php");
?>