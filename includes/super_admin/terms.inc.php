<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../dbh.inc.php';
    require_once '../SuperAdmin_model.inc.php';
    require_once '../config.session.inc.php';


    update_super_admin_agreement($pdo, $_SESSION["account_id"]);

    // Redirect to the admin dashboard or another page
    header("Location: ../../public/view/super_admin/accounts.php");
    exit();
} else {
    // If the form is not submitted, redirect to the terms page or show an error
    header("Location: ../../public/view/super_admin/accounts.php");
    exit();
}
