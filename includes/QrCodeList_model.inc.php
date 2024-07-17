<?php
//require certain data type
declare(strict_types=1);

function delete_vehicle(object $pdo, string $qr_id)
{
    $query = "DELETE FROM qr_info WHERE qr_id = :qr_id";
    $statement = $pdo->prepare($query);
    $statement->execute([':qr_id' => $qr_id]);
}

function manual_search(object $pdo, string $search)
{
    $query = "
                SELECT first_name,middle_name, last_name, qr_info.vehicle_type, qr_info.plate_number, qr_info.registered, homeowners.block, homeowners.lot, homeowners.street
                FROM qr_info
                JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
                WHERE qr_info.plate_number LIKE :search
            ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':search' => '%' . $search . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_manual_search_table(object $pdo)
{
    $query = "
    SELECT first_name,middle_name, last_name, qr_info.vehicle_type, qr_info.plate_number, qr_info.registered, homeowners.block, homeowners.lot, homeowners.street
    FROM qr_info
    JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
    ORDER BY qr_id DESC 
    LIMIT 10
";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
