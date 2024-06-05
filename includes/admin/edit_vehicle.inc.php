<?php

//Wrong file_name (this is about inserting a new vehicle of a homeowner)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = htmlspecialchars($_POST["id"]);
    $email = htmlspecialchars($_POST["email"]);
    $address = htmlspecialchars($_POST["address"]);
    $vehicle_type = htmlspecialchars($_POST["vehicle_type"]);
    $wheel = htmlspecialchars($_POST["wheel"]);
    $plate_number = htmlspecialchars($_POST["plate_number"]);

    try {
        require_once '../dbh.inc.php';
        require_once '../Admin_model.inc.php';
        require_once '../Admin_contr.inc.php';
        require_once '../config.session.inc.php';

        if (five_input_empty($email, $address, $wheel, $plate_number, $vehicle_type)) {
            $_SESSION["empty_input"] = "Fill in all fields!";
            header("Location: ../../public/view/admin/vehicle_list.php?email=$id");
            die();
        }

        if (input_has_number($vehicle_type) || input_has_letter($wheel)) {
            $_SESSION["invalid_format"] = "Invalid vehicle information format!";
            header("Location: ../../public/view/admin/vehicle_list.php?email=$id");
            die();
        }

        //the sequence should be followed, otherwise it would fail
        // $result = get_homeowner($pdo, $email);

        // if (!$result) {
        //     $_SESSION["not_registered"] = "Email not registered!";
        //     header("Location: ../../public/view/admin/vehicle_list.php?email=$id");
        //     die();
        // }

        update_vehicle($pdo, $id, $vehicle_type, $plate_number, $wheel);


        header("Location: ../../public/view/admin/vehicle_list.php?vehicle_edit=success");
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/vehicle_list.php");
    die();
}
