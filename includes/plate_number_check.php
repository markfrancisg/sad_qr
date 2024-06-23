<?php
if (isset($_POST['plate_number'])) {
    $plate_number = $_POST['plate_number'];

    try {
        require_once 'dbh.inc.php';
        require_once 'Admin_model.inc.php';

        $rowCount = check_plate_number_status($pdo, $plate_number);

        if ($rowCount > 0) {
            echo "taken";
        } else {
            echo "available";
        }
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../public/view/admin/qr_code.php");
    die();
}
