<?php
//require_once(__DIR__ . "/../lib/functions.php");
require_once(__DIR__ . "/../partials/nav.php");
?>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="logName"> Login Name </label>
        <input type="text" name="logName" required maxlength="30">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div>
        <label for="confirm">Confirm</label>
        <input type="password" name="confirm" required minlength="8" />
    </div>
    
    <input type="submit" value="Register" />
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        return true;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se($_POST, "confirm", "", false);
    $logName = se($_POST, "logName", "", false);


    //TODO 3.0
    $hasError = false;
    if (!preg_match('/^[a-z-9_-]{3,30}$/', $logName)) {
        flash("Login Name must be at least 3 characters and a maximum of 30. It must be lowercase, alphanumerical, or either special character _ or -", "warning");
        $hasError = true;
    }
    if (empty($email)) {
        //TODO 3.1 flash("Email must not be empty", "danger");
        flash("Email must not be empty");
        $hasError = true;
    }
    //sanitize
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //TODO 4.1 replace 4.0: $email = sanitize_email($email);
    //validate
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //TODO 4.1: if (!is_valid_email($email)) {
    //TODO 4.2:     flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        flash("Invalid email address");
        $hasError = true;
    }

    if (empty($password)) {
        flash("Password must not be empty");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty");
        $hasError = true;
    }
    if (strlen($password) < 8) {
        flash("Password must be >8 characters");
        $hasError = true;
    }
    if (strlen($password) > 0 && $password !== $confirm) {
        flash("Passwords must match");
        $hasError = true;
    }
    if (!$hasError) {
        //flash("Welcome, $email");
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO User (email, pwrdHash, logName) VALUES(:email, :password, :logName)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":logName" => $logName]);
            flash("Successfully registered!");
        //TODO 5.1     echo with: flash("Successfully registered!", "success");
        } catch (Exception $e) {
            flash("There was a problem registering<br>");
            echo "<pre>" . var_export($e, true) . "</pre>";
        //TODO 5.1    users_check_duplicate($e->errorInfo);
        } 
    }
}
?>
<!-- TODO 5.1: adding flash() -->
<?php
require_once(__DIR__ . "/../partials/flash.php");
?>