<?php
require(__DIR__ . "/../partials/nav.php");
is_logged_in(true);
?>

<h1>Internal Transfer</h1>

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
        <label for="account">Choose Account to Deposit to:</label>
        <select name="dAccount" id="dAccount">
            <option value=""></option>
            <?php
                $db = getDB();
                $stmt = $db->prepare("SELECT accountNum, balance FROM Account WHERE userID = :userID");
                $stmt->execute([":userID"=>get_user_id()]);
                while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $dAccountNum = $result['accountNum'];
                    $balance = $result['balance'];
            ?>
            <option value="<?php echo $dAccountNum; ?>"> <?php echo $dAccountNum . " : " . $balance; ?> </option>
            <?php } ?>
        </select>
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
    if (isset($_POST["wAccount"]) && isset($_POST["dAccount"]) && isset($_POST["amount"]) && isset($_POST["submit"])){
        $wAccountNum = strval($_POST["wAccount"]);
        $dAccountNum = se($_POST, "dAccount", "", false);
        $amount = (int)se($_POST, "amount", "", false);
        //var_dump($wAccountNum);
        //echo $dAccountNum;
        if (isset($_POST["memo"])){
            $memo = se($_POST, "memo", "", false);
        }
        //echo $memo;
        $hasError = false;
        $db = getDB();

        if (!$hasError){
            //check if transfer amount is more than the withdraw account balance
            $stmt = $db->prepare("SELECT id, accountNum, balance FROM Account WHERE accountNum = :accountNum");
            try{
                $stmt->execute([":accountNum"=>$wAccountNum]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                $balance = $result->balance;
                $id = $result->id;
                //echo "account id is " . $id;
                if ($balance < $amount){
                    $hasError = true;
                    flash("withdraw amount is greater than whats in withdrawal account", "warning");
                }
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        }
        //grabbing ids and updating balances of respective accounts
        if (!$hasError){
            $stmt = $db->prepare("SELECT id, accountNum FROM Account 
                            WHERE accountNum = :wAccount");
            $stmt2 = $db->prepare("SELECT id, accountNum FROM Account 
                            WHERE accountNum = :dAccount");
            $stmt3 = $db->prepare("SELECT id, accountNum, balance FROM Account WHERE accountNum = :account");
            $stmt4 = $db->prepare("UPDATE Account SET balance = :balance WHERE accountNum = :account");
            try{
                $stmt->execute([":wAccount"=>$wAccountNum]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                $withdrawID = (int)$result->id;
                $stmt2->execute([":dAccount"=>$dAccountNum]);
                $result = $stmt2->fetch(PDO::FETCH_OBJ);
                $depositID = (int)$result->id;
                //echo "withdraw id is " . $withdrawID;
                //echo "deposit id is " . $depositID;
                $stmt3->execute([":account"=>$wAccountNum]);
                $result = $stmt3->fetch(PDO::FETCH_OBJ);
                $currentWBalance = $result->balance;
                $stmt3->execute([":account"=>$dAccountNum]);
                $result = $stmt3->fetch(PDO::FETCH_OBJ);
                $currentDBalance = $result->balance;
                //echo "current withdraw balance is " . $currentWBalance;
                //echo "current deposit balance is " . $currentDBalance;
                $updatedWBalance = $currentWBalance - $amount;
                $updatedDBalance = $currentDBalance + $amount;
                $stmt4->execute([":balance"=>$updatedWBalance, ":account"=>$wAccountNum]);
                $stmt4->execute([":balance"=>$updatedDBalance, ":account"=>$dAccountNum]);
                flash("successfully transferred funds", "success");
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        }
        //making transaxction pair
        if (!$hasError){
            $stmt1 = $db->prepare("INSERT INTO Transactions (accountSrc, accountDest, balanceChg, transType, memo, expectedTotal) 
                                    VALUES (:accountSrc, :accountDest, :balanceChg, :transType, :memo, :expectedTotal)");
            try{
                $stmt1->execute([":accountSrc" => $withdrawID, ":accountDest" => $depositID, ":balanceChg" => (-1 * $amount), 
                                    ":transType" => "transfer", ":memo" => "", ":expectedTotal" => ($updatedWBalance)]);
                $stmt1->execute([":accountSrc" => $depositID, ":accountDest" => $withdrawID, ":balanceChg" => ($amount), 
                                    ":transType" => "transfer", ":memo" => "trans to acct" . $depositID . " from acct" . $withdrawID, 
                                    ":expectedTotal" => ($updatedDBalance)]);
            }catch(Exception $e) {
                users_check_duplicate($e->errorInfo);
            }
        }
    }
?>
<br>

<h1><?php echo get_username(); ?>'s Checking Account(s):</h1>

<table border="1">
        <tr>
            <th>Account Number</th>
            <th>Account Type</th>
            <th>Modified Date</th>
            <th>Current Balance</th>
        </tr>
        <?php
            $db = getDB();
            $stmt = $db->prepare("SELECT accountNum, accountType, modified, balance FROM Account WHERE userID = :userID LIMIT 4 OFFSET 0");
            $stmt->execute([":userID"=>get_user_id()]);
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $accountNum = $result["accountNum"];
                $accountType = $result["accountType"];
                $modified = $result["modified"];
                $balance = $result["balance"];  
            
        ?>
        <tr>
            <td>
                <form onsubmit="return validate(this)" method="POST">
                    <input type="submit" value="<?php echo $accountNum; ?>" name="accountNum" >
                </form>
            </td>
            <td><?php echo $accountType; ?></td>
            <td><?php echo $modified; ?></td>
            <td><?php echo $balance; ?></td>
        </tr>
        <?php }; ?>
</table>

<h1>Internal Transaction History</h1>

<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="date">Search History by Date:</label>

        <input type="date" name="startDate"/>
        <label for="-"> - </label>
        <input type="date" name="endDate">
    </div>
    <div>
        <label for="type">Search History by type of transaction:</label>
        <select name="type" id="type">
            <option value=""></option>
            <option value="deposit">deposit</option>
            <option value="withdraw">withdraw</option>
            <option value="transfer">transfer</option>
        </select>
    </div>

    <input type="submit" value="Submit" />
</form>

<table border="1">
        <tr>
            <th>Account Source</th>
            <th>Account Destination</th>
            <th>Transaction Type</th>
            <th>Balance</th>
            <th>Occured On</th>
        </tr>
        <?php
            //grabbing ids of all checking accounts of this user
            $db = getDB();
            $stmt = $db->prepare("SELECT id, accountNum FROM Account WHERE userID = :userID");
            $stmt2 = $db->prepare("SELECT accountSrc, accountDest, balanceChg, transType, memo, expectedTotal, created
                                    FROM Transactions 
                                    WHERE accountSrc = :account
                                    LIMIT 12 OFFSET 0");
            try{
                $stmt->execute([":userID"=>get_user_id()]);
                while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                    $accountId = (int)$result->id;
                    //echo $accountId;
                    $stmt2->execute([":account"=>$accountId]);
                    $result2 = $stmt2->fetch(PDO::FETCH_OBJ);
                    //$accountSrc = (int)$result2->accountSrc;
                    //echo $accountSrc;
        ?>
        <tr>
            <td><?php echo $accountType; ?></td>
            <td><?php echo $modified; ?></td>
            <td><?php echo $balance; ?></td>
        </tr>
            <?php
            }
                }catch(Exception $e){
                    users_check_duplicate($e->errorInfo);
                }  
            ?>
    
</table>



<?php
    require(__DIR__ . "/../partials/flash.php");
?>