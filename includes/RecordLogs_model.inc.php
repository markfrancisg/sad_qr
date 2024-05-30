<?php
//require certain data type
declare(strict_types=1);


function get_record_logs(PDO $pdo)
{
    $query = "SELECT qr_info.vehicle_type, qr_info.plate_number, qr_info.qr_code, homeowners.block, homeowners.lot, homeowners.street,
            station_info.station, station_info.entry_exit, log.date_time
              FROM log
              JOIN qr_info ON log.qr_id = qr_info.qr_id
              JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              JOIN station_info ON log.station_id = station_info.station_id
              ORDER BY log.log_id DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
