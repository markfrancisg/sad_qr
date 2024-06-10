<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    try {
        require_once 'dbh.inc.php';
        require_once 'Admin_model.inc.php';

        $rowCount = check_email_status($pdo, $email);

        if ($rowCount > 0) {
            echo 'taken';
        } else {
            echo 'available';
        }
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../public/view/admin/homeowners.php");
    die();
}
