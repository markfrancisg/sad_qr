<?php
//require certain data type
declare(strict_types=1);


function scan_qr(object $pdo, string $qr_text)
{
    $query = "SELECT qr_info.qr_id, qr_info.wheel, qr_info.vehicle_type, qr_info.plate_number, qr_info.qr_code, qr_info.vehicle_color, homeowners.first_name, 
    homeowners.last_name, homeowners.block, homeowners.lot, homeowners.street 
              FROM qr_info
              JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              WHERE qr_info.qr_code = :qr_code";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":qr_code", $qr_text);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
