<?php
//require certain data type
declare(strict_types=1);


function get_record_logs(PDO $pdo)
{
  $query = "SELECT log_name, log_plate_number, log_address, log_vehicle, entry_log, exit_log
              FROM log
              ORDER BY log_id DESC";
  $stmt = $pdo->prepare($query);
  $stmt->execute();

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

function get_record_logs_daily(PDO $pdo)
{
  date_default_timezone_set('Asia/Manila');
  $current_date = date('Y-m-d');

  $query = "SELECT log_name, log_plate_number, log_address, log_vehicle, entry_log, exit_log
              FROM log
              WHERE DATE(log.date) = :current_date
              ORDER BY log_id DESC";

  $stmt = $pdo->prepare($query);

  // Bind the current date parameter
  $stmt->bindParam(':current_date', $current_date);

  $stmt->execute();

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

function get_record_logs_weekly(PDO $pdo)
{
  date_default_timezone_set('Asia/Manila');
  $current_date = date('Y-m-d');

  // Calculate the start of the week (Monday)
  $start_of_week = date('Y-m-d', strtotime('monday this week'));

  $query = "SELECT log_name, log_plate_number, log_address, log_vehicle, entry_log, exit_log
              FROM log
              WHERE DATE(log.date) BETWEEN :start_of_week AND :current_date
              ORDER BY log_id DESC";

  $stmt = $pdo->prepare($query);

  // Bind the date parameters
  $stmt->bindParam(':start_of_week', $start_of_week);
  $stmt->bindParam(':current_date', $current_date);

  $stmt->execute();

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}
