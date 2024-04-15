<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["account_email"]);

    try {
        require_once 'dbh.inc.php';
        require_once 'User_model.inc.php';
        require_once 'User_contr.inc.php';

        //Error handlers
        $errors = [];
        if (is_input_empty($email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }


        if (is_email_invalid($email)) {
            $errors["email_invalid"] = "Invalid email format!";
        }


        $result = get_user($pdo, $email);

        if (is_email_wrong($result)) {
            $errors["email_not_found"] = "Email not found!";
        }

        require_once 'config.session.inc.php';

        if ($errors) {
            $_SESSION["errors_reset_password"] = $errors;
            header("Location: ../public/view/reset_password.php");

            die();
        }

        $email = $result["account_email"];

        generate_token($pdo, $email);
        $_SESSION["password_reset_email"] = "Email Sent";
        header("Location: ../public/view/reset_password.php");
        die();
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../public/view/reset_password.php");
    die();
}
