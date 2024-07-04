<?php

// try {
//     if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
//         $page_no = $_GET['page_no'];
//     } else {
//         $page_no = 1;
//     }

//     $total_records_per_page = 15;

//     $offset = ($page_no - 1) * $total_records_per_page;

//     $previous_page = $page_no - 1;

//     $next_page = $page_no + 1;

//     $total_records = count_logs_list_daily($pdo);

//     $total_no_of_pages = ceil($total_records / $total_records_per_page);

//     $results = get_logs_list_daily($pdo, $offset, $total_records_per_page);

//     if (isset($_GET['searchButton'])) {
//         $searchInput = isset($_GET['searchInput']) ? $_GET['searchInput'] : '';

//         $results = search_daily($pdo, $searchInput);
//     }

//     $searchPerformed = isset($_GET['searchButton']);
// } catch (PDOException $e) {
//     die("Query failed:" . $e->getMessage());
// }



try {

    require_once 'dbh.inc.php';
    require_once 'Logs_model.inc.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Assuming you have already established $pdo connection

        // Handle pagination parameters
        $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
        $totalRecordsPerPage = isset($_GET['total_records_per_page']) ? intval($_GET['total_records_per_page']) : 10;

        // Fetch logs list
        $logs = get_logs_list_daily($pdo, $offset, $totalRecordsPerPage);

        // Fetch total number of records for pagination
        $totalRecords = count_logs_list_daily($pdo);

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
