<?php
//require certain data type
declare(strict_types=1);

// function record_log(object $pdo, string $qr_id, string $station_id, string $time)
// {
//     $query = "INSERT INTO log (qr_id, station_id, `time`) VALUES (:qr_id, :station_id, :time)";
//     $stmt2 = $pdo->prepare($query);
//     // Bind parameters
//     $stmt2->execute([
//         ':qr_id' => $qr_id,
//         ':station_id' => $station_id,
//         ':time' => $time
//     ]);
// }

function count_logs_list(object $pdo)
{
    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) as count FROM log";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['count'];
}

function get_logs_list(object $pdo,  int $offset, int $total_records_per_page)
{
    $query = "SELECT log_name, log_plate_number, log_address, log_vehicle, entry_log, exit_log
              FROM log
              ORDER BY log.log_id DESC
              LIMIT $offset, $total_records_per_page";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function count_logs_list_daily(object $pdo)
{
    // Set the timezone and get the current date
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    // Prepare the SQL statement with a WHERE clause to filter by the current date
    $sql = "SELECT COUNT(*) as count FROM log WHERE DATE(date) = :current_date";

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

function get_logs_list_daily(object $pdo, int $offset, int $total_records_per_page)
{
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    // Prepare the SQL query with placeholders for LIMIT
    $query = "SELECT log_name, log_plate_number, log_address, log_vehicle, entry_log, exit_log
              FROM log
    WHERE DATE(log.date) = :current_date
    ORDER BY log_id DESC
    LIMIT :offset, :total_records_per_page";

    $stmt = $pdo->prepare($query);

    // Bind the parameters
    $stmt->bindParam(':current_date', $current_date);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':total_records_per_page', $total_records_per_page, PDO::PARAM_INT);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_logs_list_weekly(object $pdo, int $offset, int $total_records_per_page)
{
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    // Calculate the start of the week (Monday)
    $start_of_week = date('Y-m-d', strtotime('monday this week'));

    // Prepare the SQL query with placeholders for LIMIT
    $query = "SELECT log_name, log_plate_number, log_address, log_vehicle, entry_log, exit_log
              FROM log
    WHERE DATE(log.date) BETWEEN :start_of_week AND :current_date
    ORDER BY log_id DESC
    LIMIT :offset, :total_records_per_page";

    $stmt = $pdo->prepare($query);

    // Bind the parameters
    $stmt->bindParam(':start_of_week', $start_of_week);
    $stmt->bindParam(':current_date', $current_date);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':total_records_per_page', $total_records_per_page, PDO::PARAM_INT);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function count_logs_list_weekly(object $pdo)
{
    // Set the timezone and get the current date
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    // Calculate the start of the week (Monday)
    $start_of_week = date('Y-m-d', strtotime('monday this week'));

    // Prepare the SQL statement with a WHERE clause to filter by the current week
    $sql = "SELECT COUNT(*) as count FROM log WHERE DATE(date) BETWEEN :start_of_week AND :current_date";

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

// function handleLog($pdo, $qr_id, $date, $date_time, $column)
// {
//     //Check Pseudocode na ginawa sa excel when logic problem occurs
//     // Prepare the query to check for existing log entry
//     $query = "SELECT log_id FROM log WHERE qr_id = :qr_id AND date = :date AND $column IS NULL";
//     $stmt = $pdo->prepare($query);
//     $stmt->bindParam(":qr_id", $qr_id);
//     $stmt->bindParam(":date", $date);
//     $stmt->execute();
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);

//     if (!$result) {
//         // If no existing log, insert a new log entry
//         $sql1 = "INSERT INTO log (qr_id, date, $column) VALUES (:qr_id, :date, :date_time)";
//         $stmt1 = $pdo->prepare($sql1);
//         $stmt1->bindParam(":qr_id", $qr_id);
//         $stmt1->bindParam(":date", $date);
//         $stmt1->bindParam(":date_time", $date_time);
//         $stmt1->execute();
//     } else {
//         // If existing log found, update the log entry
//         $log_id = $result['log_id'];
//         $sql = "UPDATE log SET $column = :date_time WHERE log_id = :log_id";
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(':date_time', $date_time);
//         $stmt->bindParam(':log_id', $log_id, PDO::PARAM_INT);
//         $stmt->execute();
//     }
// }

function handleLog($pdo, $date, $log_plate_number, $log_name, $log_address, $log_vehicle, $date_time, $column)
{
    //Check Pseudocode na ginawa sa excel when logic problem occurs
    // Prepare the query to check for existing log entry
    $query = "SELECT log_id FROM log WHERE log_plate_number = :log_plate_number AND date = :date AND $column IS NULL";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":log_plate_number", $log_plate_number);
    $stmt->bindParam(":date", $date);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        // If no existing log, insert a new log entry
        $sql1 = "INSERT INTO log (date, log_plate_number, log_name, log_address, log_vehicle, $column) VALUES (:date,:log_plate_number,:log_name,:log_address,:log_vehicle, :date_time)";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(":date", $date);
        $stmt1->bindParam(":log_plate_number", $log_plate_number);
        $stmt1->bindParam(":log_name", $log_name);
        $stmt1->bindParam(":log_address", $log_address);
        $stmt1->bindParam(":log_vehicle", $log_vehicle);
        $stmt1->bindParam(":date_time", $date_time);
        $stmt1->execute();
    } else {
        // If existing log found, update the log entry
        $log_id = $result['log_id'];
        $sql = "UPDATE log SET $column = :date_time WHERE log_id = :log_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':date_time', $date_time);
        $stmt->bindParam(':log_id', $log_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}

function search_all($pdo, $searchQuery)
{
    $sql = "SELECT log_name, log_plate_number, log_address, log_vehicle, entry_log, exit_log
              FROM log
    WHERE log_plate_number LIKE ?";
    $stmt = $pdo->prepare($sql);

    $likeSearchQuery = "%" . $searchQuery . "%";
    $stmt->bindParam(1, $likeSearchQuery);

    // Execute the statement
    $stmt->execute();

    // Fetch all rows
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the fetched rows
    return $rows;
}

function search_daily($pdo, $searchQuery)
{
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    $sql = "SELECT log_name, log_plate_number, log_address, log_vehicle, entry_log, exit_log
              FROM log
    WHERE log_plate_number LIKE :likeSearchQuery AND DATE(log.date) = :current_date";

    $stmt = $pdo->prepare($sql);

    $likeSearchQuery = "%" . $searchQuery . "%";
    $stmt->bindParam(':likeSearchQuery', $likeSearchQuery);
    $stmt->bindParam(':current_date', $current_date);

    // Execute the statement
    $stmt->execute();

    // Fetch all rows
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the fetched rows
    return $rows;
}

function search_weekly($pdo, $searchQuery)
{
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    // Calculate the start of the week (Monday)
    $start_of_week = date('Y-m-d', strtotime('monday this week'));

    $sql = "SELECT log_name, log_plate_number, log_address, log_vehicle, entry_log, exit_log
              FROM log
    WHERE log_plate_number LIKE :likeSearchQuery AND DATE(log.date) BETWEEN :start_of_week AND :current_date";

    $stmt = $pdo->prepare($sql);

    $likeSearchQuery = "%" . $searchQuery . "%";
    $stmt->bindParam(':likeSearchQuery', $likeSearchQuery);
    $stmt->bindParam(':start_of_week', $start_of_week);
    $stmt->bindParam(':current_date', $current_date);

    // Execute the statement
    $stmt->execute();

    // Fetch all rows
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the fetched rows
    return $rows;
}
