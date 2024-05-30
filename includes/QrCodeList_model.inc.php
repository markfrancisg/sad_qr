<?php
//require certain data type
declare(strict_types=1);

function delete_vehicle(object $pdo, string $id)
{
    $query = "DELETE FROM qr_info WHERE qr_id = :qr_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':qr_id', $id);
    $stmt->execute();
}
