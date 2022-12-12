<?php
require(__DIR__ . "/../partials/nav.php");
is_logged_in(true);
?>

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

        if ($deposit < 10){
            flash("Initial deposit must be greater than $10", "warning");
        }

        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Accounts (balance) VALUES(:email)");
    }


?>

<?php
    require(__DIR__ . "/../partials/flash.php");
?>