<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $role_description = htmlspecialchars($_POST["role_description"]);
    $email = htmlspecialchars($_POST["email"]);
    $number = htmlspecialchars($_POST["number"]);

    try {
        require_once '../dbh.inc.php';
        require_once '../User_model.inc.php';
        require_once '../User_contr.inc.php';

        $errors = [];
        if (five_input_empty($first_name, $last_name, $role_description, $email, $number)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        if (is_name_wrong($first_name) || is_name_wrong($last_name)) {
            $errors["incorrect_name"] = "Invalid name format!";
        }

        //checks if the email format is valid
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }

        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }

        if (is_number_valid($number)) {
            $errors["invalid_number"] = "Invalid phone number!";
        }


        require_once '../config.session.inc.php';

        if ($errors) {
            $_SESSION["errors_create_account"] = $errors;

            $signupData = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "role_description" => $role_description,
                "email" => $email,
                "number" => $number,
            ];

            $_SESSION["create_account_data"] = $signupData;


            header("Location: ../../public/view/admin/accounts.php");
            die();
        }

        $role_id = get_role_id($pdo, $role_description);

        create_user($pdo, $role_id, $email, $first_name, $last_name, $number,);

        header("Location: ../../public/view/admin/accounts.php?account_creation=success");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/accounts.php");
    die();
}
