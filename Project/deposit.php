<?php
require(__DIR__ . "/../partials/nav.php");
is_logged_in(true);
?>

<h1>Deposit Funds:</h1>

<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="deposit">Deposit Amount:</label>
        <input type="number" name="deposit" required placeholder="e.g. 10"/>
    </div>
    <input type="submit" value="Submit" />
</form>

<?php

    

?>




<?php
    require(__DIR__ . "/../partials/flash.php");
?>