<?php

//Wrong file_name (this is about inserting a new vehicle of a homeowner)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $address = htmlspecialchars($_POST["address"]);
    $vehicle_type = htmlspecialchars($_POST["vehicle_type"]);
    $wheel = htmlspecialchars($_POST["wheel"]);
    $plate_number = htmlspecialchars($_POST["plate_number"]);


    echo $email;
    echo $address;
    echo $vehicle_type;
    echo $wheel;
    echo $plate_number;

    try {
        require_once '../dbh.inc.php';
        require_once '../Admin_model.inc.php';
        require_once '../Admin_contr.inc.php';
        require_once '../config.session.inc.php';

        if (five_input_empty($email, $address, $wheel, $plate_number, $vehicle_type)) {
            $_SESSION["empty_input"] = "Fill in all fields!";
            header("Location: ../../public/view/admin/qr_code.php");
            die();
        }

        if (input_has_number($vehicle_type) || input_has_letter($wheel)) {
            $_SESSION["invalid_format"] = "Invalid vehicle information format!";
            header("Location: ../../public/view/admin/qr_code.php");
            die();
        }

        //the sequence should be followed, otherwise it would fail
        $result = get_homeowner($pdo, $email);

        if (!$result) {
            $_SESSION["not_registered"] = "Email not registered!";
            header("Location: ../../public/view/admin/qr_code.php");
            die();
        }



        $ho_id = $result["ho_id"];

        // var_dump($generated_qr);

        insert_qr($pdo, $wheel, $vehicle_type, $plate_number, $ho_id);

        $_SESSION["qr_email"] = $email;
        header("Location: ../../public/view/admin/qr_code.php?vehicle_creation=success");
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/qr_code.php");
    die();
}
