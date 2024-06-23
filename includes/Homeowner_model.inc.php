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

    $query = "SELECT ho_id, first_name, last_name, block, lot, street, email, number
    FROM homeowners
    ORDER BY ho_id DESC
    LIMIT $offset, $total_records_per_page";
    //newest to oldest

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function search_homeowner($pdo, $searchQuery)
{
    $sql = "SELECT ho_id, email, first_name, last_name, block, lot, street, number
        FROM homeowners
        WHERE CONCAT(first_name, ' ', last_name) LIKE ?";
    $stmt = $pdo->prepare($sql);

    $likeSearchQuery = "%" . $searchQuery . "%";
    $stmt->bindParam(1, $likeSearchQuery);

    // Execute the statement
    $stmt->execute();

    // Fetch all rows
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the fetched rows
    return $rows;
}
// function delete_homeowner(object $pdo, string $email)
// {
//     $query = "DELETE FROM homeowners WHERE email = :email";
//     $stmt = $pdo->prepare($query);
//     $stmt->bindParam(':email', $email);
//     $stmt->execute();
// }

// function delete_homeowner($pdo, )
// {
//     $query = "DELETE FROM tbl_employee WHERE id = '" . $_POST['checkbox_value'][$count] . "'";
//     $statement = $connect->prepare($query);
//     $statement->execute();
// }
