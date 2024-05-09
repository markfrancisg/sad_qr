<?php

declare(strict_types=1);

function insert_visitor(object $pdo, string $first_name, string $last_name, string $purpose)
{
    $sql = "INSERT INTO visitor_log (first_name, last_name, purpose) VALUES (:first_name, :last_name, :purpose)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":first_name", $first_name);
    $stmt->bindParam(":last_name", $last_name);
    $stmt->bindParam(":purpose", $purpose);
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
