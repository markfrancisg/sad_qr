<?php

declare(strict_types=1);

if (isset($_GET['email']) && !empty($_GET['email'])) {
    $old_email = $_GET['email'];

    try {
        $results = get_specified_homeowner($pdo, $old_email);

        // if (!$results) {
        //     // Redirect if no results found
        //     header("Location: homeowner_list.php");
        //     exit(); // Exit after redirect
        // }

        foreach ($results as $result) {
            // Access the data from the current row
            $first_name = $result['first_name'];
            $last_name = $result['last_name'];
            $email = $result['email'];
            $number = $result['number'];
            $block = $result['block'];
            $lot = $result['lot'];
            $street = $result['street'];
        }
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    // Redirect if email parameter is not set or empty
    header("Location: homeowner_list.php");
    exit(); // Exit after redirect
}
