<?php
require(__DIR__ . "/../partials/nav.php");
is_logged_in(true);

$username = get_username();
?>

<h1>$username's Checking Account(s):</h1>

<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="deposit">Deposit Amount:</label>
        <input type="number" name="deposit" required placeholder="e.g. 10"/>
    </div>
    <input type="submit" value="Submit" />
</form>

<?php
    if (isset($_POST["deposit"])){
        $deposit = se($_POST, "deposit", "", false);
        $hasError = false;

        if (!$hasError){

        }

    }

?>




<?php
    require(__DIR__ . "/../partials/flash.php");
?>