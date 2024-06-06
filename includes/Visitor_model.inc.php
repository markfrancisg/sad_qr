<?php

declare(strict_types=1);

function insert_visitor(object $pdo, string $visitor_first_name, string $visitor_last_name, string $purpose, string $visitor_plate_number, string $visitor_vehicle_type, string $visitor_wheel, string $visitor_time)
{
    $sql = "INSERT INTO visitor_log (visitor_first_name, visitor_last_name, purpose, visitor_plate_number,visitor_vehicle_type, visitor_wheel, visitor_time) VALUES (:visitor_first_name, :visitor_last_name, :purpose, :visitor_plate_number, :visitor_vehicle_type, :visitor_wheel, :visitor_time )";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":visitor_first_name", $visitor_first_name);
    $stmt->bindParam(":visitor_last_name", $visitor_last_name);
    $stmt->bindParam(":purpose", $purpose);
    $stmt->bindParam(":visitor_plate_number", $visitor_plate_number);
    $stmt->bindParam(":visitor_vehicle_type", $visitor_vehicle_type);
    $stmt->bindParam(":visitor_wheel", $visitor_wheel);
    $stmt->bindParam(":visitor_time", $visitor_time);


    $stmt->execute();
}

function get_visitor_list(object $pdo)
{
    $query = "SELECT first_name, last_name, purpose, date_time
          FROM visitor_log 
          ORDER BY visitor_id DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
