<?php
// Check if the QR code text is received
if (isset($_GET['qr_text'])) {
    $qr_text = $_GET['qr_text'];

    if ($qr_text === "Not Registered") {
        header("Location: ../public/view/guard/scan_results.php?entry=denied");
        exit();
    }

    //validation if not registered ang na scan na qr


    try {
        require_once 'dbh.inc.php';
        require_once 'Scanner_model.inc.php';
        require_once 'config.session.inc.php';
        require_once 'Logs_model.inc.php';
        require_once 'SetStation_model.inc.php';

        //get the station id
        // $station_id = get_station_id($pdo, $station);

        //check if qr_text is existing in the database
        $results = scan_qr($pdo, $qr_text);


        //validation to test if QR is registered
        if (!$results) {
            header("Location: ../public/view/guard/scan_results.php?entry=denied");
            exit();
        }

        if (empty($results['middle_name'])) {
            $results['middle_name'] = "";
        }


        //Determine if Entry or Exit
        $station = $_SESSION['station'];

        //get the details of the vehicle
        $qr_id = $results['qr_id']; // Get QR ID
        $wheel = $results['wheel'];
        $vehicle_type = $results['vehicle_type'];
        $plate_number = $results['plate_number'];
        $vehicle_color = $results['vehicle_color'];
        $name = $results['first_name'] . " " . $results['middle_name'] . " " . $results['last_name'];
        $address = "Block " . $results['block'] . ", Lot " . $results['lot'] . " ," . $results['street'] . " Street";
        $qr_code = $results['qr_code'];

        //standard time
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d'); // Current date in year month day
        $time = date('H:i'); // Without seconds (00 for seconds)
        $guard_name = $_SESSION["account_full_name"];
        $vehicle_info = $vehicle_type . ", " . $wheel . "-wheeler";
        $log = $time . " | " . $station . " | " . $guard_name;

        // Determine the column to update based on the station
        // if ($station == "Gate 1" || $station == "Gate 2") {
        //     $result = handleLog($pdo, $date, $plate_number, $name, $address, $vehicle_info, $date_time, 'entry_log');
        // } elseif ($station == "Gate 3" || $station == "Gate 4") {
        //     $result = handleLog($pdo, $date, $plate_number, $name, $address, $vehicle_info, $date_time, 'exit_log');
        // }


        if ($station == "Gate 1") {
            $result = handleLog($pdo, $date, $plate_number, $name, $address, $vehicle_info, $log, 'entry_log');
        } elseif ($station == "Gate 2") {
            $result = handleLog($pdo, $date, $plate_number, $name, $address, $vehicle_info, $log, 'exit_log');
        }

        // if ($station == "Gate 1") {
        //     $result = handleLog($pdo, $date, $plate_number, $name, $address, $vehicle_info, $date_time, 'entry_log');
        // } elseif ($station == "Gate 2") {
        //     $result = handleLog($pdo, $date, $plate_number, $name, $address, $vehicle_info, $date_time, 'exit_log');
        // }

        // if (!$result) {
        //     header("Location: ../public/view/guard/scan_results.php?entry=wrong");
        //     exit();
        // }


        $qr_scan_result = array(
            'name' => $name,
            'address' => $address,
            'qr_code' => $qr_code,
            'wheel' => $wheel,
            'vehicle_type' => $vehicle_type,
            'plate_number' => $plate_number,
            'vehicle_color' => $vehicle_color
        );

        $_SESSION['vehicle_data_qr_scan'] = $qr_scan_result;

        //redirect the user to the details page
        header("Location: ../public/view/guard/scan_results.php?entry=success");
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