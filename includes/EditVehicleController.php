<?php

declare(strict_types=1);

if (isset($_GET['qr_id']) && !empty($_GET['qr_id'])) {
    $id = $_GET['qr_id'];

    try {
        $results = get_specified_vehicle($pdo, $id);

        if (!$results) {
            // Redirect if no results found
            header("Location: vehicle_list.php");
            exit(); // Exit after redirect
        }

        foreach ($results as $result) {
            // Access the data from the current row
            $selectedEmail = $result['email'];
            $name = $result['first_name'] . " " . $result['last_name'];
            $address = "Block " . $result['block'] . ", Lot " . $result['lot'] . ", " . $result['street'] . " Street" ;
            $vehicle_color = $result['vehicle_color'];
            $vehicle_type = $result['vehicle_type'];
            $plate_number = $result['plate_number'];
            $wheel = $result['wheel'];
        }
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    // Redirect if email parameter is not set or empty
    header("Location: vehicle_list.php");
    exit(); // Exit after redirect
}
