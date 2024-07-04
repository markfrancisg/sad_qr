<?php
try {

    require_once 'dbh.inc.php';
    require_once 'Logs_model.inc.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Assuming you have already established $pdo connection

        // Handle pagination parameters
        $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
        $totalRecordsPerPage = isset($_GET['total_records_per_page']) ? intval($_GET['total_records_per_page']) : 10;

        // Fetch logs list
        $logs = get_logs_list($pdo, $offset, $totalRecordsPerPage);

        // Fetch total number of records for pagination
        $totalRecords = count_logs_list($pdo);

        // Prepare JSON response
        $response = [
            'logs' => $logs,
            'totalRecords' => $totalRecords
        ];

        // Output JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    // Handle other HTTP methods or invalid requests
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
} catch (PDOException $e) {
    die("Query failed:" . $e->getMessage());
}
