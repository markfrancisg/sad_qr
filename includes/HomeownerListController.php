<?php

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$total_records_per_page = 10;

$offset = ($page_no - 1) * $total_records_per_page;

$previous_page = $page_no - 1;

$next_page = $page_no + 1;

$total_records = count_homeowner_list($pdo);

$total_no_of_pages = ceil($total_records / $total_records_per_page);

$results = get_homeowner_list($pdo, $offset, $total_records_per_page);


if (isset($_GET['searchButton'])) {
    // Get the search input value
    $searchInput = isset($_GET['searchInput']) ? $_GET['searchInput'] : '';

    // Prepare SQL query
    $sql = "SELECT ho_id, email, first_name, last_name, block, lot, street, number
            FROM homeowners
            WHERE CONCAT(first_name, ' ', last_name) LIKE ?";
    $stmt = $pdo->prepare($sql);

    // Bind the search input value
    $likeSearchQuery = "%" . $searchInput . "%";
    $stmt->bindParam(1, $likeSearchQuery);

    // Execute the statement
    $stmt->execute();

    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
