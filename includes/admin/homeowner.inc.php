<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
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

        $errors = [];
        if (seven_input_empty($first_name, $last_name, $email, $number, $block, $lot, $street)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        require_once '../config.session.inc.php';

        if ($errors) {
            $_SESSION["errors_create_account"] = $errors;

            // $signupData = [
            //     "first_name" => $first_name,
            //     "last_name" => $last_name,
            //     "role_description" => $role_description,
            //     "account_email" => $email,
            //     "account_number" => $number,
            // ];

            // $_SESSION["create_account_data"] = $signupData;
            header("Location: ../../public/view/admin/homeowners.php");
            die();
        }

        $complete_address = complete_address($block, $lot, $street);
        $complete_name =   complete_name($first_name, $last_name);

        insert_homeowner($pdo, $complete_name, $email, $number, $complete_address);
        header("Location: ../../public/view/admin/homeowners.php");
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/homeowners.php");
    die();
}
