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

    <div>
        <?php 
            if (isset($_POST["accountNum"])){
                $accountNum = se($_POST, "accountNum", "", false);
            }
            $db = getDB();
            //$stmt1 = $db->prepare("SELECT id FROM Account WHERE accountNum = :accountNum");
            $stmt = $db->prepare("SELECT Account.id, Transactions.accountNum, Transactions.accountSrc, Transactions.accountDest, Transactions.transType, 
                                            Transactions.balanceChg, Transactions.created, Transactions.expectedTotal, Transactions.memo 
                                FROM Transactions LEFT JOIN Account ON Transactions.accountSrc = Account.id
                                WHERE accountNum = :accountNum LIMIT 12 OFFSET 0");
            try{
                //$result = $stmt->execute([":accountNum"=>$accountNum]);
                //$id = $result->id;
                $result = $stmt->execute([":accountNum"=>$accountNum]);
                var_dump($result);
            }catch(Exception $e){
                users_check_duplicate($e->errorInfo);
            }
        ?>
        <table>

        </table>
    </div>



</body>



<?php
    require(__DIR__ . "/../partials/flash.php");
?>