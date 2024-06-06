<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $visitor_first_name = htmlspecialchars($_POST["visitor_first_name"]);
    $visitor_last_name = htmlspecialchars($_POST["visitor_last_name"]);
    $purpose = htmlspecialchars($_POST["purpose"]);
    $visitor_plate_number = htmlspecialchars($_POST["visitor_plate_number"]);
    $visitor_vehicle_type = htmlspecialchars($_POST["visitor_vehicle_type"]);
    $visitor_wheel = htmlspecialchars($_POST["visitor_wheel"]);


    try {
        require_once '../dbh.inc.php';
        require_once '../Visitor_model.inc.php';
        require_once '../Visitor_contr.inc.php';
        require_once '../config.session.inc.php';

        if (six_input_empty($visitor_first_name, $visitor_last_name, $purpose, $visitor_plate_number, $visitor_vehicle_type, $visitor_wheel)) {
            $_SESSION["empty_input"] = "Fill in all fields!";
            header("Location: ../../public/view/guard/visitor.php");
            die();
        }

        if (input_has_number($visitor_first_name) || input_has_number($visitor_last_name)) {
            $_SESSION["invalid_name"] = "Name should only contain letters!";
            header("Location: ../../public/view/guard/visitor.php");
            die();
        }

        date_default_timezone_set('Asia/Manila');
        $visitor_time = date('H:i:s');


        insert_visitor($pdo, $visitor_first_name, $visitor_last_name, $purpose, $visitor_plate_number, $visitor_vehicle_type, $visitor_wheel, $visitor_time);
        header("Location: ../../public/view/guard/visitor.php?visitor_creation=success");
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/guard/visitor.php");
    die();
}
