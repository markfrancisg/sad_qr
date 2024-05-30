<?php

declare(strict_types=1);

function get_station_id(object $pdo, string $station)
{
    $query = "SELECT station_id FROM station_info WHERE station = :station";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':station', $station, PDO::PARAM_STR);
    $stmt->execute();

    // Return only the station_id value
    return $stmt->fetchColumn(0);
}
