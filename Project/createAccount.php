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
        $deposit = se($_POST, "deposit", "", false);

        $hasError = false;

        $num = rand(000000000001, 999999999999);
        $db = getDB();
        $stmt = $db->prepare("SELECT accountNum FROM Account WHERE accountNum = $num)");
        //$query = "SELECT accountNum FROM Account WHERE accountNum = $num";
        //$result = $db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        while ($result){
            $num = rand(000000000001, 999999999999);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if ($deposit < 10){
            flash("Initial deposit must be at least $10", "warning");
            $hasError = true;
        }

        if (!$hasError){
            $stmt = $db->prepare("INSERT INTO Account (accountNum, balance, accountType) VALUES(:accountNum, :balance, :accountType)");
            try{
                $stmt->execute([":accountNum" => $num, ":balance" => $deposit, ":accountType" => "checking"]);
                die(header("Location: accounts.php"));
                flash("Successfully Registered for Checking Account! '\n'Funds have been added to your checking account.", "success");
            }catch (Exception $e) {
                users_check_duplicate($e->errorInfo);
            }
        }
    }
?>

<?php
    require(__DIR__ . "/../partials/flash.php");
?>