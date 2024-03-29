<?php
require(__DIR__ . "/../partials/nav.php");
?>
<h1>Home</h1>
<?php

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>

<?php 
    //jeb79     date: 12/18/22
?>
<div class="center-screen">
    <nav>
        <ul>
            <?php if (is_logged_in()) : ?>
                <li><a href="createAccount.php">Create Account</a></li>
                <li><a href="accounts.php">My Accounts</a></li>
                <li><a href="deposit.php">Deposit</a></li>
                <li><a href="withdraw.php">Withdraw</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="internalTransfer.php">Internal Transfers</a></li>
                <li><a href="externalTransfer.php">External Transfers</a></li>

            <?php endif; ?>
            <?php if (!is_logged_in()) : ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>






<?php
require(__DIR__ . "/../partials/flash.php");
?>