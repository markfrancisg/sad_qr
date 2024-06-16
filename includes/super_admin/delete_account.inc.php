<?php

if (isset($_POST["checkbox_value"])) {

    try {
        require_once '../dbh.inc.php';
        require_once '../SuperAdmin_model.inc.php';

        foreach ($_POST["checkbox_value"] as $account_id) {
            delete_account($pdo, $account_id);
        }
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/super_admin/account_list.php");
    die();
}
