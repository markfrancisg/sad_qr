<?php
try {
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 10;

    $offset = ($page_no - 1) * $total_records_per_page;

    $previous_page = $page_no - 1;

    $next_page = $page_no + 1;

    $total_records = count_account_list($pdo);

    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    $results = get_user_list($pdo, $offset, $total_records_per_page);

    //Portion for the searchButton, results will be altered once search button is clicked
    if (isset($_GET['searchButton'])) {
        // Get the search input value
        $searchInput = isset($_GET['searchInput']) ? $_GET['searchInput'] : '';

        $results = search_all_accounts($pdo, $searchInput);
    }

    $searchPerformed = isset($_GET['searchButton']);
} catch (PDOException $e) {
    die("Query failed:" . $e->getMessage());
}

