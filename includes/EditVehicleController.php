<?php

declare(strict_types=1);

if (isset($_GET['email']) && !empty($_GET['email'])) {
    $id = $_GET['email'];

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
