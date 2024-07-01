<?php
//require certain data type
declare(strict_types=1);

function get_user_agreement(PDO $pdo, string $account_id)
{
    $query = "SELECT agreement FROM account WHERE account_id = :account_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":account_id", $account_id);
    $stmt->execute();

    $result = $stmt->fetchColumn(); // Fetches the first column from the next row of a result set
    return $result !== false ? (int) $result : null; // Cast to integer or return null if no result found
}

function update_guard_agreement(object $pdo, string $account_id)
{
    $query = "UPDATE account SET agreement = 1 WHERE account_id = :account_id";
    $stmt = $pdo->prepare($query);

    // Bind parameters
    $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();
}