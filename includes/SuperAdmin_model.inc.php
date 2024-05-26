<?php
//require certain data type
declare(strict_types=1);

function get_user_list(object $pdo)
{
    $query = "SELECT account_email, role_description, account_first_name,account_last_name, account_number 
          FROM account
          INNER JOIN role_info ON account.role_id = role_info.role_id
          INNER JOIN user_info ON account.account_id = user_info.account_id
          WHERE role_info.role_description IN ('guard', 'admin')
          ORDER BY account.account_id DESC";

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