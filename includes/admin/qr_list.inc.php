<?php
//ayusin pa yung format ng try and catch
if (isset($_POST["checkbox_value"])) {
    try {
        require_once '../dbh.inc.php';
        require_once '../QrCodeList_model.inc.php';
        require_once '../config.session.inc.php';


        foreach ($_POST["checkbox_value"] as $ho_id) {
            delete_vehicle($pdo, $ho_id);
        }

        header("Location: ../../public/view/admin/vehicle_list.php");
        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/qr_code.php");
    die();
}
