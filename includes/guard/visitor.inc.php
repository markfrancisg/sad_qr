<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $purpose = htmlspecialchars($_POST["purpose"]);


    try {
        require_once '../dbh.inc.php';
        require_once '../Visitor_model.inc.php';
        require_once '../Visitor_contr.inc.php';
        require_once '../config.session.inc.php';

        if (three_input_empty($first_name, $last_name, $purpose)) {
            $_SESSION["empty_input"] = "Fill in all fields!";
            header("Location: ../../public/view/guard/visitor.php");
            die();
        }

        if (input_has_number($first_name) || input_has_number($last_name)) {
            $_SESSION["invalid_name"] = "Name should only contain letters!";
            header("Location: ../../public/view/guard/visitor.php");
            die();
        }

        insert_visitor($pdo, $first_name, $last_name, $purpose);
        header("Location: ../../public/view/guard/visitor.php?visitor_creation=success");
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/guard/visitor.php");
    die();
}
