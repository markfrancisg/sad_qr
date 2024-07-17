<?php

if (isset($_GET['email']) && !empty($_GET['email'])) {
    $email = $_GET['email'];

    try {
        require_once '../dbh.inc.php';
        require_once '../Admin_model.inc.php';

        $name = get_homeowner_name($pdo, $email);

        if ($name) {
            // Check if first_name and last_name keys exist in the array
            $first_name = isset($name['first_name']) ? $name['first_name'] : '';
            $middle_name = isset($name['middle_name']) ? $name['middle_name'] : '';
            $last_name = isset($name['last_name']) ? $name['last_name'] : '';

            echo $first_name . " " . $middle_name . " " . $last_name;
        } else {
            echo 'NOT_FOUND'; // Return a specific string if no address is found
        }
    } catch (PDOException $e) {
        die("Query failed " . $e->getMessage());
    }
} else {
    echo ''; // No email provided or email is empty
}
