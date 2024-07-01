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
    $query = "SELECT account.account_id, account_email, role_description, account_first_name, account_last_name, account_number, verification_status
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
    $query = "SELECT account.account_id, account_email, role_description, account_first_name, account_last_name, account_number, verification_status
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


function search_all_accounts($pdo, $searchQuery)
{
    $sql = "SELECT account.account_id, account_email, role_description, account_first_name,account_last_name, account_number, verification_status
          FROM account
          INNER JOIN role_info ON account.role_id = role_info.role_id
          INNER JOIN user_info ON account.account_id = user_info.account_id
    WHERE CONCAT(account_first_name, ' ', account_last_name) LIKE ?";
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

function search_verified_accounts($pdo, $searchQuery)
{
    $sql = "SELECT account.account_id, account_email, role_description, account_first_name,account_last_name, account_number, verification_status
          FROM account
          INNER JOIN role_info ON account.role_id = role_info.role_id
          INNER JOIN user_info ON account.account_id = user_info.account_id
    WHERE CONCAT(account_first_name, ' ', account_last_name) LIKE ? AND role_info.role_description IN ('guard', 'admin') AND verification_status = 1";
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

function search_unverified_accounts($pdo, $searchQuery)
{
    $sql = "SELECT account.account_id, account_email, role_description, account_first_name,account_last_name, account_number, verification_status
          FROM account
          INNER JOIN role_info ON account.role_id = role_info.role_id
          INNER JOIN user_info ON account.account_id = user_info.account_id
    WHERE CONCAT(account_first_name, ' ', account_last_name) LIKE ? AND role_info.role_description IN ('guard', 'admin') AND verification_status = 0";
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



function get_user_agreement(PDO $pdo, string $account_id)
{
    $query = "SELECT agreement FROM account WHERE account_id = :account_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":account_id", $account_id);
    $stmt->execute();

    $result = $stmt->fetchColumn(); // Fetches the first column from the next row of a result set
    return $result !== false ? (int) $result : null; // Cast to integer or return null if no result found
}

function update_super_admin_agreement(object $pdo, string $account_id)
{
    $query = "UPDATE account SET agreement = 1 WHERE account_id = :account_id";
    $stmt = $pdo->prepare($query);

    // Bind parameters
    $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();
}