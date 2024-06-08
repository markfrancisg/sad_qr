<?php

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$total_records_per_page = 15;

$offset = ($page_no - 1) * $total_records_per_page;

$previous_page = $page_no - 1;

$next_page = $page_no + 1;

$total_records = count_logs_list_daily($pdo);

$total_no_of_pages = ceil($total_records / $total_records_per_page);

$results = get_logs_list_daily($pdo, $offset, $total_records_per_page);
