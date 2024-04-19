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

        if (is_input_empty($password) || is_input_empty($confirm_password)) {
            $_SESSION["empty_input"] = "Fill in all fields!";
            header("Location: ../public/view/reset_password_confirm.php?token=$token&email=$email");
            die();
        }

        //SEQUENCE SHOULD BE FOLLOWED

        if (is_input_empty($email) || is_input_empty($token)) {
            $_SESSION["token_not_found"] = "Token not found!";
            header("Location: ../public/view/reset_password.php");
            die();
        }

        $result = get_user($pdo, $email);

        //token not found if null or empty
        if ($result['token'] === NULL) {
            $_SESSION["token_not_found"] = "Token not found!";
            header("Location: ../public/view/reset_password.php");
            die();
        }

        if (is_token_expired($result['token_expiration'])) {
            $_SESSION["token_expired"] = "Token expired!";
            header("Location: ../public/view/reset_password.php");
            die();
        }

        $token_checker = $result["token"];

        //Invalid if input token is not a match to token in the database
        if (verify_token($token, $token_checker)) {
            $_SESSION["invalid_token"] = "Token invalid!";
            header("Location: ../public/view/reset_password.php");
            die();
        }

        if (is_password_format_incorrect($password)) {
            $_SESSION["incorrect_password_format"] = "Incorrect password format!";
            header("Location: ../public/view/reset_password_confirm.php?token=$token&email=$email");
            die();
        }

        //if wrong passwords, return also the token and email for reference
        if (is_match($password, $confirm_password)) {
            $_SESSION["password_not_match"] = "Passwords do not match!";
            header("Location: ../public/view/reset_password_confirm.php?token=$token&email=$email");
            die();
        }

        update_password($pdo, $email, $password);
        header("Location: ../index.php?reset_password=success");

        die();
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../public/view/reset_password_confirm.php");
    die();
}
