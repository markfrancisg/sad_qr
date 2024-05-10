<?php
//require certain data type
declare(strict_types=1);


function count_homeowner_list(object $pdo)
{
    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) as homeowner_count FROM homeowners";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['homeowner_count'];
}

function get_homeowner_list(object $pdo, int $offset, int $total_records_per_page)
{

    $query = "SELECT first_name, last_name, block, lot, street, email, number
          FROM homeowners
          LIMIT $offset, $total_records_per_page";
    //newest to oldest

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


function delete_homeowner(object $pdo, string $email)
{
    $query = "DELETE FROM homeowners WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}
