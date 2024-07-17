<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $middle_name = htmlspecialchars($_POST["middle_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $number = htmlspecialchars($_POST["number"]);
    $block = htmlspecialchars($_POST["block"]);
    $lot = htmlspecialchars($_POST["lot"]);
    $street = htmlspecialchars($_POST["street"]);

    try {
        require_once '../dbh.inc.php';
        require_once '../Admin_model.inc.php';
        require_once '../Admin_contr.inc.php';
        require_once '../config.session.inc.php';


        if (seven_input_empty($first_name, $last_name, $email, $number, $block, $lot, $street)) {
            $_SESSION["empty_input"] = "Fill in all fields!";
            header("Location: ../../public/view/admin/homeowners.php");
            die();
        }

        if (input_has_number($first_name) || input_has_number($last_name)) {
            $_SESSION["invalid_name"] = "Name should only contain letters!";
            header("Location: ../../public/view/admin/homeowners.php");
            die();
        }

        if (is_email_invalid($email)) {
            $_SESSION["email_invalid"] = "Invalid email!";
            header("Location: ../../public/view/admin/homeowners.php");
            die();
        }
        if (is_email_registered($pdo, $email)) {
            $_SESSION["email_registered"] = "Email taken!";
            header("Location: ../../public/view/admin/homeowners.php");
            die();
        }

        if (input_has_letter($number) || is_phone_invalid($number)) {
            $_SESSION["invalid_number"] = "Invalid phone number!";
            header("Location: ../../public/view/admin/homeowners.php");
            die();
        }

        if (input_has_letter($block) || input_has_letter($lot)) {
            $_SESSION["invalid_address"] = "Invalid address format!";
            header("Location: ../../public/view/admin/homeowners.php");
            die();
        }


        // $complete_address = complete_address($block, $lot, $street);
        // $complete_name =   complete_name($first_name, $last_name);

        insert_homeowner($pdo, $first_name, $middle_name, $last_name, $email, $number, $block, $lot, $street);
        header("Location: ../../public/view/admin/homeowners.php?homeowner_creation=success");
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/homeowners.php");
    die();
}
