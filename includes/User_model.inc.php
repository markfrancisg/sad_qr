<?php
//require certain data type
declare(strict_types=1);

function get_user(object $pdo, string $email)
{
    $query = "SELECT * FROM account WHERE account_email = :account_email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":account_email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getRole(object $pdo, int $account_id)
{
    $query = "SELECT account.account_id, role_info.role_description
              FROM account
              JOIN role_info ON account.role_id = role_info.role_id
              WHERE account.account_id = :account_id";


    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":account_id", $account_id); // Bind the account_id parameter
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the result is not empty before using it
    if ($result) {
        // Assuming role_description is the column you want to sanitize
        $result['role_description'] = htmlspecialchars($result['role_description']);
    }

    return $result;
}

function get_email(object $pdo, string $email)
{
    $query = "SELECT account_email FROM account WHERE account_email = :account_email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":account_email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function set_account(object $pdo, string $email, string $password, string $role_id, string $first_name, string $last_name, string $number)
{
    $sql1 = "INSERT INTO account (account_email, password, role_id) VALUES (:account_email, :password, :role_id)";
    $stmt1 = $pdo->prepare($sql1);
    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt1->bindParam(":account_email", $email);
    $stmt1->bindParam(":password", $hashedPwd);
    $stmt1->bindParam(":role_id", $role_id);

    $stmt1->execute();

    $account_id = $pdo->lastInsertId();

    $sql2 = "INSERT INTO user_info (account_first_name, account_last_name, account_number, account_id) VALUES (:account_first_name, :account_last_name, :account_number, :account_id)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(":account_first_name", $first_name);
    $stmt2->bindParam(":account_last_name", $last_name);
    $stmt2->bindParam(":account_number", $number);
    $stmt2->bindParam(":account_id", $account_id);
    $stmt2->execute();
}

function searchRoleId(object $pdo, string $role_description)
{
    $query = "SELECT role_id FROM role_info WHERE role_description = :role_description;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":role_description", $role_description);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['role_id'];
}


function insert_token(object $pdo, string $email, string $token, string $token_expiration)
{
    $query = "UPDATE account SET token = :token, token_expiration = :token_expiration WHERE account_email = :account_email";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":token", $token);
    $stmt->bindValue(":token_expiration", $token_expiration);
    $stmt->bindValue(":account_email", $email);
    $stmt->execute();
}


function update_password(object $pdo, string $email, string $password)
{
    $query = "UPDATE account SET password = :password WHERE account_email = :account_email";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":password", $hashedPwd);
    $stmt->bindParam(":account_email", $email);
    $stmt->execute();
}
