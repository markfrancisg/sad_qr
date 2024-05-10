<?php
//ayusin pa yung format ng try and catch
if (isset($_GET["email"])) {
    try {
        require_once '../dbh.inc.php';
        require_once '../QrCodeList_model.inc.php';
        require_once '../config.session.inc.php';


        $id = htmlspecialchars($_GET["email"]);
        delete_vehicle($pdo, $id);

        $imageFilePath = "../../public/img/$id.png";

        // Check if the file exists before attempting to delete it
        if (file_exists($imageFilePath)) {
            // Attempt to delete the file
            unlink($imageFilePath);
        }

        header("Location: ../../public/view/admin/qr_code.php?#qr_pagination");
        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location: ../../public/view/admin/qr_code.php");
    die();
}
