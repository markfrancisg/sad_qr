<?php
//require certain data type
declare(strict_types=1);

function get_user_list(object $pdo, int $offset, int $total_records_per_page)
{
    $query = "SELECT account.account_id, account_email, role_description, account_first_name,account_last_name, account_number, verification_status
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

function get_user_list_verified(PDO $pdo, int $offset, int $total_records_per_page)
{
    $query = "SELECT account_email, role_description, account_first_name, account_last_name, account_number, verification_status
          FROM account
          INNER JOIN role_info ON account.role_id = role_info.role_id
          INNER JOIN user_info ON account.account_id = user_info.account_id
          WHERE role_info.role_description IN ('guard', 'admin') AND verification_status = 1
          ORDER BY account.account_id DESC
          LIMIT :offset, :total_records_per_page";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':total_records_per_page', $total_records_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_user_list_unverified(PDO $pdo, int $offset, int $total_records_per_page)
{
    $query = "SELECT account_email, role_description, account_first_name, account_last_name, account_number, verification_status
          FROM account
          INNER JOIN role_info ON account.role_id = role_info.role_id
          INNER JOIN user_info ON account.account_id = user_info.account_id
          WHERE role_info.role_description IN ('guard', 'admin') AND verification_status = 0
          ORDER BY account.account_id DESC
          LIMIT :offset, :total_records_per_page";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':total_records_per_page', $total_records_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function delete_account(object $pdo, string $id)
{
    $query = "DELETE FROM account WHERE account_id = :account_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':account_id', $id);
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

function count_account_list_verified(PDO $pdo)
{
    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) as account_count FROM account WHERE verification_status = 1";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['account_count'];
}

function count_account_list_unverified(PDO $pdo)
{
    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) as account_count FROM account WHERE verification_status = 0";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['account_count'];
}


function get_specified_account(PDO $pdo, string $email)
{
    $query = "SELECT account_email, role_description, account_first_name, account_last_name, account_number 
              FROM account
              INNER JOIN role_info ON account.role_id = role_info.role_id
              INNER JOIN user_info ON account.account_id = user_info.account_id
              WHERE account.account_email = :email";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


function check_email_status(PDO $pdo, string $email)
{
    $stmt = $pdo->prepare("SELECT account_id 
                           FROM account 
                           WHERE account_email = ?");
    $stmt->execute([$email]);

    return $rowCount = $stmt->rowCount();
}
