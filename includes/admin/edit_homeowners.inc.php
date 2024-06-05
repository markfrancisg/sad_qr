<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $number = htmlspecialchars($_POST["number"]);
    $block = htmlspecialchars($_POST["block"]);
    $lot = htmlspecialchars($_POST["lot"]);
    $street = htmlspecialchars($_POST["street"]);
    $old_email = htmlspecialchars($_POST["old_email"]);



    try {
        require_once '../dbh.inc.php';
        require_once '../Admin_model.inc.php';
        require_once '../Admin_contr.inc.php';
        require_once '../config.session.inc.php';


        if (seven_input_empty($first_name, $last_name, $email, $number, $block, $lot, $street)) {
            $_SESSION["empty_input"] = "Fill in all fields!";
            header("Location: ../../public/view/admin/edit_homeowner.php?email=$old_email");
            die();
        }

        if (input_has_number($first_name) || input_has_number($last_name)) {
            $_SESSION["invalid_name"] = "Name should only contain letters!";
            header("Location: ../../public/view/admin/edit_homeowner.php?email=$old_email");
            die();
        }

        if (is_email_invalid($email)) {
            $_SESSION["email_invalid"] = "Invalid email!";
            header("Location: ../../public/view/admin/edit_homeowner.php?email=$old_email");
            die();
        }
        if (is_email_registered_except($pdo, $email, $old_email)) {
            $_SESSION["email_registered"] = "Email taken!";
            header("Location: ../../public/view/admin/edit_homeowner.php?email=$old_email");
            die();
        }

        if (input_has_letter($number) || is_phone_invalid($number)) {
            $_SESSION["invalid_number"] = "Invalid phone number!";
            header("Location: ../../public/view/admin/edit_homeowner.php?email=$old_email");
            die();
        }

        if (input_has_letter($block) || input_has_letter($lot)) {
            $_SESSION["invalid_address"] = "Invalid address format!";
            header("Location: ../../public/view/admin/edit_homeowner.php?email=$old_email");
            die();
        }


        // var_dump($role_id);
        // echo $role_id;
        // update_account($pdo, $role_id, $email, $first_name, $last_name, $number, $old_email);
        update_homeowner($pdo, $first_name, $last_name, $email, $number, $block, $lot, $street, $old_email);

        header("Location: ../../public/view/admin/homeowner_list.php?homeowner_edit=success");
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/homeowner_list.php");
    die();
}
