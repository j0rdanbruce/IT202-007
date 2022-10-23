<?php
require_once(__DIR__ . "/../lib/functions.php");
//TODO: 0.1: require_once(__DIR__ . "/../partials/nav.php");
?>
<form onsubmit="return validate(this)" method="POST">
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


    //TODO 3.0
    $hasError = false;
    if (empty($email)) {
        //TODO 3.1 flash("Email must not be empty", "danger");
        echo "Email must not be empty";
        $hasError = true;
    }
    //sanitize
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //TODO 4.1 replace 4.0: $email = sanitize_email($email);
    //validate
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //TODO 4.1: if (!is_valid_email($email)) {
    //TODO 4.2:     flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        echo "Invalid email address";
        $hasError = true;
    }

    if (empty($password)) {
        echo "Password must not be empty";
        $hasError = true;
    }
    if (empty($confirm)) {
        echo "Confirm password must not be empty";
        $hasError = true;
    }
    if (strlen($password) < 8) {
        echo "Password must be >8 characters";
        $hasError = true;
    }
    if (strlen($password) > 0 && $password !== $confirm) {
        echo "Passwords must match";
        $hasError = true;
    }
    if (!$hasError) {
        echo "Welcome, $email";
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO User (email, pwrdHash) VALUES(:email, :password)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash]);
            echo "Successfully registered!";
        //TODO 5.1     echo with: flash("Successfully registered!", "success");
        } catch (Exception $e) {
            echo "There was a problem registering<br>";
            echo "<pre>" . var_export($e, true) . "</pre>";
        //TODO 5.1    users_check_duplicate($e->errorInfo);
        } 
    }
}
?>
<!-- TODO 5.1: adding flash() -->
<?php
//require(__DIR__ . "/../../partials/flash.php");
?>