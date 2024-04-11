<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $token = htmlspecialchars($_POST["token"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["confirm_password"]);



    try {
        require_once 'dbh.inc.php';
        require_once 'User_model.inc.php';
        require_once 'User_contr.inc.php';
        require_once 'config.session.inc.php';


        //Error handlers
        $errors = [];
        if (is_input_empty($password) || is_input_empty($confirm_password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        if (is_match($password, $confirm_password)) {
            $errors["password_not_match"] = "Passwords do not match!";
        }

        if ($errors) {
            $_SESSION["errors_password_reset"] = $errors;
            header("Location: ../public/view/reset_password_confirm.php?token=$token$email=$email");
            die();
        }

        // if (two_input_empty($email, $token)) {
        //     header("Location: ../reset_password.php");
        //     die();
        // }

        $result = get_user($pdo, $email);
        $token_checker = $result["token"];

        if (verify_token($token, $token_checker)) {
            header("Location: ../public/view/reset_password.php");
            die();
        }

        update_password($pdo, $email, $password);
        header("Location: ../index.php");

        die();
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../public/view/reset_password_confirm.php");
    die();
}
