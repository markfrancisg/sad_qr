<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["account_email"]);

    try {
        require_once 'dbh.inc.php';
        require_once 'User_model.inc.php';
        require_once 'User_contr.inc.php';
        require_once 'config.session.inc.php';


        //Error handlers
        if (is_input_empty($email)) {
            $_SESSION["empty_input"] = "Fill in all fields!";
            header("Location: ../forgot_password.php");
            die();
        }

        if (is_email_invalid($email)) {
            $_SESSION["email_invalid"] = "Invalid email format!";
            header("Location: ../forgot_password.php");
            die();
        }

        //Sequence should be followed
        $result = get_user($pdo, $email);

        if (is_email_wrong($result)) {
            $_SESSION["email_not_found"] = "Email not found!";
            header("Location: ../forgot_password.php");
            die();
        }

        $email = $result["account_email"];

        generate_token($pdo, $email);

        $_SESSION["password_reset_email"] = $email;
        header("Location: ../forgot_password.php");
        die();
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../forgot_password.php");
    die();
}
