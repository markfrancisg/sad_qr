<?php

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    try {
        // require_once '../../includes/dbh.inc.php';
        // require_once '../../includes/Admin_model.inc.php';
        require_once '../dbh.inc.php';
        require_once '../Admin_model.inc.php';
        $address = get_homeowner_address($pdo, $email);

        echo $address;
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
}
