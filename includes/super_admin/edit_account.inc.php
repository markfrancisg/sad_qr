<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $old_email = htmlspecialchars($_POST["old_email"]);
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $role_description = htmlspecialchars($_POST["role_description"]);
    $email = htmlspecialchars($_POST["account_email"]);
    $number = htmlspecialchars($_POST["account_number"]);

    try {
        require_once '../dbh.inc.php';
        require_once '../User_model.inc.php';
        require_once '../User_contr.inc.php';
        require_once '../config.session.inc.php';


        if (five_input_empty($first_name, $last_name, $role_description, $email, $number)) {
            $_SESSION["empty_input"] = "Fill in all fields!";
            header("Location: ../../public/view/admin/edit_account.php?email=$old_email");
            die();
        }

        if (is_name_wrong($first_name) || is_name_wrong($last_name)) {
            $_SESSION["name_wrong"] = "Name should only contain letters!";
            header("Location: ../../public/view/admin/edit_account.php?email=$old_email");
            die();
        }

        //checks if the email format is valid
        if (is_email_invalid($email)) {
            $_SESSION["invalid_email"] = "Invalid email!";
            header("Location: ../../public/view/admin/edit_account.php?email=$old_email");
            die();
        }

        if (is_email_registered_except($pdo, $email, $old_email)) {
            $_SESSION["email_registered"] = "Email taken!";
            header("Location: ../../public/view/admin/edit_account.php?email=$old_email");
            die();
        }

        if (is_number_valid($number)) {
            $_SESSION["invalid_number"] = "Invalid phone number!";
            header("Location: ../../public/view/admin/edit_account.php?email=$old_email");
            die();
        }

        $role_id = get_role_id($pdo, $role_description);

        $role_id = intval($role_id);

        // var_dump($role_id);
        // echo $role_id;
        update_account($pdo, $role_id, $email, $first_name, $last_name, $number, $old_email);

        header("Location: ../../public/view/admin/account_list.php?account_edit=success");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/account_list.php");
    die();
}
