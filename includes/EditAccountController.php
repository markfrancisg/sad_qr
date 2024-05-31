<?php

declare(strict_types=1);

if (isset($_GET['email']) && !empty($_GET['email'])) {
    $old_email = $_GET['email'];

    try {
        $results = get_specified_account($pdo, $old_email);

        if (!$results) {
            // Redirect if no results found
            header("Location: account_list.php");
            exit(); // Exit after redirect
        }

        foreach ($results as $result) {
            // Access the data from the current row
            $first_name = $result['account_first_name'];
            $last_name = $result['account_last_name'];
            $role_description = $result['role_description'];
            $email = $result['account_email'];
            $number = $result['account_number'];
        }
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    // Redirect if email parameter is not set or empty
    header("Location: account_list.php");
    exit(); // Exit after redirect
}
