<?php
//require certain data type
declare(strict_types=1);


function scan_qr(object $pdo, string $qr_text)
{
    $query = "SELECT qr_id, wheel, vehicle_type, plate_number, registered, ho_id FROM qr_info WHERE qr_code = :qr_code;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":qr_code", $qr_text);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
