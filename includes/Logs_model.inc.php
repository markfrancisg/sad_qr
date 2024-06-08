<?php
//require certain data type
declare(strict_types=1);

function record_log(object $pdo, string $qr_id, string $station_id, string $time)
{
    $query = "INSERT INTO log (qr_id, station_id, `time`) VALUES (:qr_id, :station_id, :time)";
    $stmt2 = $pdo->prepare($query);
    // Bind parameters
    $stmt2->execute([
        ':qr_id' => $qr_id,
        ':station_id' => $station_id,
        ':time' => $time
    ]);
}

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
    $query = "SELECT first_name, last_name, qr_info.vehicle_type, qr_info.plate_number, homeowners.block, homeowners.lot, homeowners.street,
            station_info.station, station_info.entry_exit, log.date, log.time
              FROM log
              JOIN qr_info ON log.qr_id = qr_info.qr_id
              JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              JOIN station_info ON log.station_id = station_info.station_id
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

    $query = "SELECT first_name, last_name, qr_info.vehicle_type, qr_info.plate_number, homeowners.block, homeowners.lot, homeowners.street,
                     station_info.station, station_info.entry_exit, log.date, log.time
              FROM log
              JOIN qr_info ON log.qr_id = qr_info.qr_id
              JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              JOIN station_info ON log.station_id = station_info.station_id
              WHERE DATE(log.date) = :current_date
              ORDER BY log.log_id DESC
              LIMIT :offset, :total_records_per_page";

    $stmt = $pdo->prepare($query);

    // Bind the parameters
    $stmt->bindParam(':current_date', $current_date);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':total_records_per_page', $total_records_per_page, PDO::PARAM_INT);

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

    $query = "SELECT first_name, last_name, qr_info.vehicle_type, qr_info.plate_number, homeowners.block, homeowners.lot, homeowners.street,
                     station_info.station, station_info.entry_exit, log.date, log.time
              FROM log
              JOIN qr_info ON log.qr_id = qr_info.qr_id
              JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              JOIN station_info ON log.station_id = station_info.station_id
              WHERE DATE(log.date) BETWEEN :start_of_week AND :current_date
              ORDER BY log.log_id DESC
              LIMIT :offset, :total_records_per_page";

    $stmt = $pdo->prepare($query);

    // Bind the parameters
    $stmt->bindParam(':start_of_week', $start_of_week);
    $stmt->bindParam(':current_date', $current_date);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':total_records_per_page', $total_records_per_page, PDO::PARAM_INT);

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
