<?php

declare(strict_types=1);

function get_all_registered_vehicle(object $pdo)
{
    $query = "SELECT * FROM qr_info";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
}

function update_registration_status(object $pdo, int $qr_id)
{
    $query = "UPDATE qr_info SET registered = 0, qr_code = 'Not Registered', expiration_date = NULL WHERE qr_id = :qr_id";
    $stmt2 = $pdo->prepare($query);
    $stmt2->bindParam(":qr_id", $qr_id);

    $stmt2->execute();
}
