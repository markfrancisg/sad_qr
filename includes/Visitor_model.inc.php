<?php

declare(strict_types=1);

function insert_visitor(object $pdo, string $visitor_first_name, string $visitor_last_name, string $purpose, string $visitor_plate_number, string $visitor_vehicle_type, string $visitor_wheel, string $visitor_time)
{
    $sql = "INSERT INTO visitor_log (visitor_first_name, visitor_last_name, purpose, visitor_plate_number,visitor_vehicle_type, visitor_wheel, visitor_time) VALUES (:visitor_first_name, :visitor_last_name, :purpose, :visitor_plate_number, :visitor_vehicle_type, :visitor_wheel, :visitor_time )";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":visitor_first_name", $visitor_first_name);
    $stmt->bindParam(":visitor_last_name", $visitor_last_name);
    $stmt->bindParam(":purpose", $purpose);
    $stmt->bindParam(":visitor_plate_number", $visitor_plate_number);
    $stmt->bindParam(":visitor_vehicle_type", $visitor_vehicle_type);
    $stmt->bindParam(":visitor_wheel", $visitor_wheel);
    $stmt->bindParam(":visitor_time", $visitor_time);


    $stmt->execute();
}

// function get_visitor_list(object $pdo)
// {
//     $query = "SELECT first_name, last_name, purpose, date_time
//           FROM visitor_log 
//           ORDER BY visitor_id DESC";
//     $stmt = $pdo->prepare($query);
//     $stmt->execute();
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $results;
// }

function count_visitor_list(object $pdo)
{
    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) as count FROM visitor_log";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['count'];
}

function get_visitor_list(object $pdo, int $offset, int $total_records_per_page)
{
    $query = "SELECT *
          FROM visitor_log
          ORDER BY visitor_id DESC
          LIMIT $offset, $total_records_per_page";

    //newest to oldest

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function count_visitor_list_daily(object $pdo)
{
    // Get the current date
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');


    // Prepare the SQL statement with a WHERE clause to filter by the current date
    $sql = "SELECT COUNT(*) as count FROM visitor_log WHERE DATE(visitor_date) = :current_date";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind the current date parameter
    $stmt->bindParam(':current_date', $current_date);

    // Execute the SQL statement
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['count'];
}

function get_visitor_list_daily(object $pdo, int $offset, int $total_records_per_page)
{
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    // Prepare the SQL statement with a WHERE clause to filter by the current date
    $query = "SELECT *
              FROM visitor_log
              WHERE DATE(visitor_date) = :current_date
              ORDER BY visitor_id DESC
              LIMIT :offset, :total_records_per_page";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);

    // Bind the parameters
    $stmt->bindParam(':current_date', $current_date);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':total_records_per_page', $total_records_per_page, PDO::PARAM_INT);

    // Execute the SQL statement
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results
    return $results;
}

function count_visitor_list_weekly(object $pdo)
{
    // Get the current date
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    // Calculate the start of the week (Monday)
    $start_of_week = date('Y-m-d', strtotime('monday this week'));

    // Prepare the SQL statement with a WHERE clause to filter by the current week
    $sql = "SELECT COUNT(*) as count FROM visitor_log WHERE DATE(visitor_date) BETWEEN :start_of_week AND :current_date";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind the date parameters
    $stmt->bindParam(':start_of_week', $start_of_week);
    $stmt->bindParam(':current_date', $current_date);

    // Execute the SQL statement
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['count'];
}

function get_visitor_list_weekly(object $pdo, int $offset, int $total_records_per_page)
{
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    // Calculate the start of the week (Monday)
    $start_of_week = date('Y-m-d', strtotime('monday this week'));

    // Prepare the SQL statement with a WHERE clause to filter by the current week
    $query = "SELECT *
              FROM visitor_log
              WHERE DATE(visitor_date) BETWEEN :start_of_week AND :current_date
              ORDER BY visitor_id DESC
              LIMIT :offset, :total_records_per_page";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);

    // Bind the parameters
    $stmt->bindParam(':start_of_week', $start_of_week);
    $stmt->bindParam(':current_date', $current_date);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':total_records_per_page', $total_records_per_page, PDO::PARAM_INT);

    // Execute the SQL statement
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results
    return $results;
}