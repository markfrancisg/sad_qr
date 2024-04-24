<?php
// Check if the QR code text is received
if (isset($_GET['qr_text'])) {
    // Retrieve the QR code text
    $qr_text = $_GET['qr_text'];

    //validation if not registered ang na scan na qr


    try {
        require_once 'dbh.inc.php';
        require_once 'Scanner_Model.php';
        require_once 'config.session.inc.php';

        $results = scan_qr($pdo, $qr_text);

        if ($results) {
            $_SESSION['qr_id'] = $results['qr_id'];
            $_SESSION['wheel'] = $results['wheel'];
            $_SESSION['vehicle_type'] = $results['vehicle_type'];
            $_SESSION['plate_number'] = $results['plate_number'];
            $_SESSION['registered'] = $results['registered'];
            $_SESSION['ho_id'] = $results['ho_id'];

            // echo $results['qr_id'];
            // echo $results['wheel'];
            // echo $results['vehicle_type'];
            // echo $results['plate_number'];
            // echo $results['registered'];
            // echo $results['ho_id'];

            //insert the details in the log 

            //redirect the user to the details page
            header("Location: ../public/view/guard/scan_results.php");
        }

        if (!$results) {
            $_SESSION['no_result'] = "No QR Code Results Found!";
            // header("Location: ../public/view/guard/scan_results.php");
        }
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    // QR code text not received
    header("Location: ../public/view/guard/scan_qr.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head></head>

<body><a href="../public/view/guard/scan_qr.php"> Scan again</body>

</html>