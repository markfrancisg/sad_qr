<?php
// Set the Content-Type header to application/json
header('Content-Type: application/json');

// // Enable error reporting and log errors to a file
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
// ini_set('error_log', 'php-error.log'); // Set this to your desired error log path
// error_reporting(E_ALL);



try {
    require_once 'dbh.inc.php';
    require_once 'Logs_model.inc.php';

    // Get the search query
    // $searchQuery = $_GET['plate'] ?? '';

    if ($_GET['plate']) {
        $searchQuery = $_GET['plate'];
    }

    $rows = search_all($pdo, $searchQuery);

    // Replace null values with blank string
    foreach ($rows as &$row) {
        foreach ($row as $key => $value) {
            if ($value === null) {
                $row[$key] = ''; // Set to blank string
            }
        }
    }

    // Output the results as JSON
    echo json_encode($rows);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Connection failed: ' . $e->getMessage()]);
}
