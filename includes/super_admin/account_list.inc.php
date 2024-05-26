<?php
//ayusin pa yung format ng try and catch
if (isset($_GET["email"])) {
    try {
        require_once '../dbh.inc.php';
        require_once '../SuperAdmin_model.inc.php';
        require_once '../config.session.inc.php';


        $email = htmlspecialchars($_GET["email"]);
        delete_account($pdo, $email);
        header("Location: ../../public/view/super_admin/account_list.php");
        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/super_admin/accounts.php");
    die();
}
