<?php
require(__DIR__ . "/../partials/nav.php");
is_logged_in(true);

$username = get_username();
?>

<script>
    function getAccount(accountNum){
        return accountNum;
    }
</script>

<h1><?php echo get_username(); ?>'s Checking Account(s):</h1>

<body>
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
<br><br><br>
<h2>
    <?php
        if (isset($_POST["accountNum"])){
            $accountNum = se($_POST, "accountNum", "", false);
            echo "Transaction History for Account Number: " . $accountNum;
        }
    ?>
</h2>

    <table border="1">
        <tr>
            <th>Account Number</th>
            <th>Account Type</th>
            <th>Balance</th>
            <th>Created On</th>
        </tr>
        <?php
            if (isset($_POST["accountNum"])){
                $accountNum = se($_POST, "accountNum", "", false);
            }
            $db = getDB();
            $stmt = $db->prepare("SELECT accountType, balance, created FROM Account WHERE accountNum = :accountNum");
            try{
                $stmt->execute([":accountNum"=>$accountNum]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                //$accountID = (int)$result->id;
                $accountType = $result->accountType;
                $balance = $result->balance;
                $created = $result->created;

        ?>
        <tr>
            <td><?php echo $accountNum; ?></td>
            <td><?php echo $accountType; ?></td>
            <td><?php echo $balance; ?></td>
            <td><?php echo $created; ?></td>
        </tr>
        <?php
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        ?>
    </table>
    <br><br><br>
    <div>
        <table border="1">
            <tr>
                <td>Account Source</td>
                <td>Account Destination</td>
                <td>balance change</td>
                <td>Transaction Type</td>
                <td>Memo</td>
                <td>Expected Total</td>
                <td>Created On</td>
            </tr>
            <?php
            //where the transaction history will be shown. grab account id of specifiec account num
            //make query statement to retrieve all rows with actSrc = account id or actDest = account id
            if (isset($_POST["accountNum"])){
                $accountNum = strval(se($_POST, "accountNum", "", false));
                //echo $accountNum;
            }
            $db = getDB();
            $stmt = $db->prepare("SELECT id, accountNum FROM Account WHERE accountNum = :accountNum");
            $stmt2 = $db->prepare("SELECT accountSrc, accountDest, balanceChg, transType, memo, expectedTotal, created 
                                FROM Transactions
                                WHERE accountSrc = :accountSrc OR accountDest = :accountDest
                                LIMIT 12 OFFSET 0");
            try{
                $stmt->execute([":accountNum"=>$accountNum]);
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                $id = (int)$result->id;
                //echo $id;
                $stmt2->execute([":accountSrc"=>$id, ":accountDest"=>$id]);
                while($result = $stmt2->fetch(PDO::FETCH_OBJ)){
                    $accountSrc = $result->accountSrc;
                    $accountDest = $result->accountDest;
                    $balanceChg = $result->balanceChg;
                    $transType = $result->transType;
                    $memo = $result->memo;
                    $expectedTotal = $result->expectedTotal;
                    $created = $result->created;
                ?>

                <tr>
                    <td><?php echo $accountSrc;?></td>
                    <td><?php echo $accountDest;?></td>
                    <td><?php echo $balanceChg;?></td>
                    <td><?php echo $transType;?></td>
                    <td><?php echo $memo;?></td>
                    <td><?php echo $expectedTotal;?></td>
                    <td><?php echo $created;?></td>
                </tr>
                <?php
                }
                
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
            ?>

        </table>
    </div>



</body>



<?php
    require(__DIR__ . "/../partials/flash.php");
?>