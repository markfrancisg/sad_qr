<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    try {
        require_once 'dbh.inc.php';
        require_once 'User_model.inc.php';
        require_once 'User_contr.inc.php';
        require_once 'config.session.inc.php';

        //Error handlers
        if (two_input_empty($email, $password)) {
            $_SESSION["empty_input"] = "Fill in all fields!";
            header("Location: ../login.php");
            die();
        }

        if (is_email_invalid($email)) {
            $_SESSION["email_invalid"] = "Invalid email!";
            header("Location: ../login.php");
            die();
        }

        //start database query
        $result = get_user($pdo, $email);

        if ($result['verification_status'] === 0) {
            $_SESSION["unverified_account"] = "Account is not verified!";
            header("Location: ../login.php");
            die();
        }

        //if assoc is fetch, proceed, if not make error array
        if (is_email_wrong($result)) {
            $_SESSION["login_incorrect"] = "Incorrect login credentials!";
            header("Location: ../login.php");
            die();
        }

        //if assoc is fetch but wrong password
        if (!is_email_wrong($result) && is_password_wrong($password, $result["password"])) {
            $_SESSION["login_incorrect"] = "Incorrect login credentials!";
            header("Location: ../login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" .  $result["account_id"];
        session_id($sessionId);

        //$result[depends sa name ng column]
        $_SESSION["account_id"] =  htmlspecialchars($result["account_id"]);
        $_SESSION["account_email"] = htmlspecialchars($result["account_email"]);
        $roleInfo = getRole($pdo, $result["account_id"]);

        if ($roleInfo) {
            $roleDescription = $roleInfo['role_description'];
            $_SESSION["role_description"] = htmlspecialchars($roleDescription);
        }

        $_SESSION['last_regeneration'] = time();

        require_once 'authenticate.inc.php';
        redirectUser();
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../login.php");
    die();
}
