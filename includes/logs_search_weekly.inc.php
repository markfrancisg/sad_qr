<?php
// Set the Content-Type header to application/json
header('Content-Type: application/json');




try {
    require_once 'dbh.inc.php';
    require_once 'Logs_model.inc.php';

    // Get the search query
    // $searchQuery = $_GET['plate'] ?? '';

    if ($_GET['plate']) {
        $searchQuery = $_GET['plate'];
    }

    $rows = search_weekly($pdo, $searchQuery);

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
