<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["email"]);
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
            header("Location: ../verify.php?email=$email");
            die();
        }

        //SEQUENCE SHOULD BE FOLLOWED

        if (is_input_empty($email)) {
            $_SESSION["email_not_found"] = "Email not found!";
            header("Location: ../index.php");
            die();
        }

        $result = get_user($pdo, $email);

        // if ($result['verification_status'] === 1) {
        //     $_SESSION["already_verified"] = "Account is already verified!";
        //     header("Location: ../login.php");
        //     die();
        // }

        if (is_password_format_incorrect($password)) {
            $_SESSION["incorrect_password_format"] = "Incorrect password format!";
            header("Location: ../verify.php?email=$email");
            die();
        }

        //if wrong passwords, return also the token and email for reference
        if (is_match($password, $confirm_password)) {
            $_SESSION["password_not_match"] = "Passwords do not match!";
            header("Location: ../verify.php?email=$email");
            die();
        }

        // update_password($pdo, $email, $password);
        set_password($pdo, $email, $password);

        header("Location: ../login.php?set_password=success");

        die();
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../reset_password.php");
    die();
}
