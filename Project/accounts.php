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

<h1>{$username}'s Checking Account(s):</h1>

<html>
    <body>
    <?php
        //access database
        $db = getDB();
        $stmt = $db->prepare("SELECT accountNum, accountType, modified, balance FROM Account WHERE userID = :userID LIMIT 4 OFFSET 0");
        $stmt->execute([":userID"=>get_user_id()]);
        //$result = $stmt->fetch(PDO::FETCH_ASSOC);
        //echo get_user_id();
        echo "<table border='1'>
            <tr>
                <th>Account Number</th>
                <th>Account Type</th>
                <th>Modified Date</th>
                <th>Current Balance</th>
            </tr>";
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $accountNum = $result["accountNum"];
                $accountType = $result["accountType"];
                $modified = $result["modified"];
                $balance = $result["balance"];
                echo "<tr>";
                    echo "<td>";
                        echo "<form method='POST'>";
                            echo "<input type='button' value='$accountNum' name='accountNum'/>";
                        echo "</form>";
                    echo "</td>";
                    //echo "<td> <a href='account.php' onclick='getAccount($accountNum)'>" . $accountNum . "</td>";
                    echo "<td>" . $accountType . "</td>";
                    echo "<td>" . $modified . "</td>";
                    echo "<td>" . $balance . "</td>";
                echo "</tr>";

            }
        echo "</table>";

        //<form onsubmit="return validate(this)" method="POST">
        if (isset($_POST["accountNum"])){
            $accountNum = se($_POST, "accountNum", "", false);
            echo $accountNum;
        }

    ?>
    </body>
</html>



<?php
    require(__DIR__ . "/../partials/flash.php");
?>