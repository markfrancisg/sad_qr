<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    try {
        require_once 'dbh.inc.php';
        require_once 'User_model.inc.php';
        require_once 'User_contr.inc.php';

        //Error handlers
        $errors = [];
        if (two_input_empty($email, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $email);

        if (is_email_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login credentials!";
        }

        if (!is_email_wrong($result) && is_password_wrong($password, $result["password"])) {
            $errors["login_incorrect"] = "Incorrect login credentials!";
        }


        // if (!is_email_wrong($result) && is_password_wrong($result["password"])) {
        //     $errors["login_incorrect"] = "Incorrect login credentials!";
        //     // 
        // }

        require_once 'config.session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" .  $result["account_id"];
        session_id($sessionId);

        //$result[depends sa name ng column]
        $_SESSION["account_id"] =  $result["account_id"];
        $_SESSION["email"] = htmlspecialchars($result["email"]);
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
    header("Location: ../index.php");
    die();
}
