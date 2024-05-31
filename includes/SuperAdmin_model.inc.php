<?php
//require certain data type
declare(strict_types=1);

function get_user_list(object $pdo, int $offset, int $total_records_per_page)
{
    $query = "SELECT account_email, role_description, account_first_name,account_last_name, account_number, verification_status
          FROM account
          INNER JOIN role_info ON account.role_id = role_info.role_id
          INNER JOIN user_info ON account.account_id = user_info.account_id
          WHERE role_info.role_description IN ('guard', 'admin')
          ORDER BY account.account_id DESC
          LIMIT $offset, $total_records_per_page";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function delete_account(object $pdo, string $email)
{
    $query = "DELETE FROM account WHERE account_email = :account_email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':account_email', $email);
    $stmt->execute();
}

function count_account_list(object $pdo)
{
    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) as account_count FROM account";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['account_count'];
}
