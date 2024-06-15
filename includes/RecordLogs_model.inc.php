<?php
//require certain data type
declare(strict_types=1);


function get_record_logs(PDO $pdo)
{
  $query = "SELECT first_name, last_name, qr_info.vehicle_type, qr_info.plate_number, homeowners.block, homeowners.lot, homeowners.street,
            log.date, log.entry_log, log.exit_log
              FROM log
              JOIN qr_info ON log.qr_id = qr_info.qr_id
              JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              ORDER BY log.log_id DESC";
  $stmt = $pdo->prepare($query);
  $stmt->execute();

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

function get_record_logs_daily(PDO $pdo)
{
  date_default_timezone_set('Asia/Manila');
  $current_date = date('Y-m-d');

  $query = "SELECT first_name, last_name, qr_info.vehicle_type, qr_info.plate_number, homeowners.block, homeowners.lot, homeowners.street,
                     log.date, log.entry_log, log.exit_log
              FROM log
              JOIN qr_info ON log.qr_id = qr_info.qr_id
              JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              WHERE DATE(log.date) = :current_date
              ORDER BY log.log_id DESC";

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

  $query = "SELECT first_name, last_name, qr_info.vehicle_type, qr_info.plate_number, homeowners.block, homeowners.lot, homeowners.street,
                    log.date, log.entry_log, log.exit_log
              FROM log
              JOIN qr_info ON log.qr_id = qr_info.qr_id
              JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              WHERE DATE(log.date) BETWEEN :start_of_week AND :current_date
              ORDER BY log.log_id DESC";

  $stmt = $pdo->prepare($query);

  // Bind the date parameters
  $stmt->bindParam(':start_of_week', $start_of_week);
  $stmt->bindParam(':current_date', $current_date);

  $stmt->execute();

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $results;
}
