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
