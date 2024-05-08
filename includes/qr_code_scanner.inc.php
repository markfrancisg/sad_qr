<?php
// Check if the QR code text is received
if (isset($_GET['qr_text'])) {
    $qr_text = $_GET['qr_text'];

    //validation if not registered ang na scan na qr


    try {
        require_once 'dbh.inc.php';
        require_once 'Scanner_model.inc.php';
        require_once 'config.session.inc.php';
        require_once 'Logs_model.inc.php';
        require_once 'SetStation_model.inc.php';

        $station = $_SESSION['station'];
        //get the station id
        $station_id = get_station_id($pdo, $station);

        //check if qr_text is existing in the database
        $results = scan_qr($pdo, $qr_text);

        if (!$results) {
            echo "No QR Code Results Found!";
            exit();
            // $_SESSION['no_result'] = "No QR Code Results Found!";
            // exit();
            // header("Location: ../public/view/guard/scan_results.php");
        }

        if ($results) {

            //insert the details in the log 
            $qr_id = $results['qr_id'];
            $wheel = $results['wheel'];
            $vehicle_type = $results['vehicle_type'];
            $plate_number = $results['plate_number'];
            $name = $results['first_name'] . " " . $results['last_name'];
            $address = "Block " . $results['block'] . ", Lot " . $results['lot'] . " ," . $results['street'] . " Street";
            $qr_code = $results['qr_code'];

            record_log($pdo, $qr_id, $station_id);

            $_SESSION['name'] =  $name;
            $_SESSION['address'] =  $address;
            $_SESSION['qr_code'] =  $qr_code;
            $_SESSION['wheel'] =   $wheel;
            $_SESSION['vehicle_type'] = $vehicle_type;
            $_SESSION['plate_number'] = $plate_number;


            //redirect the user to the details page
            header("Location: ../public/view/guard/scan_results.php");
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