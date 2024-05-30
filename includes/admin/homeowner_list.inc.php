<?php
//ayusin pa yung format ng try and catch
if (isset($_GET["email"])) {
    try {
        require_once '../dbh.inc.php';
        require_once '../Homeowner_model.inc.php';
        require_once '../config.session.inc.php';


        $email = htmlspecialchars($_GET["email"]);
        delete_homeowner($pdo, $email);
        header("Location: ../../public/view/admin/homeowner_list.php");
        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/homeowner_list.php");
    die();
}
