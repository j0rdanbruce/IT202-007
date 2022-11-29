<?php
require(__DIR__ . "/../partials/nav.php");
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
    <input type="submit" value="Login" />
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
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);

    //TODO 3.0
    $hasError = false;
    if (empty($email)) {
        //TODO 3.1 flash("Email must not be empty", "danger");
        flash("Email must not be empty");
        $hasError = true;
    }
    //sanitize
    //$email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //TODO 4.1 $email = sanitize_email($email);
    //validate
    //if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //TODO 4.1: 
    if (!is_valid_email($email)) {
    //TODO 4.2:     flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
         flash("Invalid email address");
         $hasError = true;
     }

    if (empty($password)) {
        flash("Password must not be empty");
        $hasError = true;
    }
    if (strlen($password) < 8) {
        flash("Password must be >8 characters");
        $hasError = true;
    }
    if (!$hasError) {
        flash("Welcome, $email");
        //TODO 4.0
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, pwrdHash, logName from User where email = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["pwrdHash"];
                    unset($user["pwrdHash"]);
                    if (password_verify($password, $hash)) {
                        //flash("Welcome $email");

                        $_SESSION["user"] = $user;
                        die(header("Location: home.php"));
                    } else {
                       flash("Invalid password");
                    }
                } else {
                    flash("Email not found");
                }
            }
        } catch (Exception $e) {
            echo "<pre>" . var_export($e, true) . "</pre>";
        }

    }
}
?>

<?php
require_once(__DIR__ . "/../partials/flash.php");
?>