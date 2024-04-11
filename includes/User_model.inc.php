<?php
//require certain data type
declare(strict_types=1);

function get_user(object $pdo, string $email)
{
    $query = "SELECT * FROM account WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
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
    $query = "SELECT email FROM account WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function set_account(object $pdo, string $email, string $password, string $role_id, $name, $number)
{
    $sql1 = "INSERT INTO account (email, password, role_id) VALUES (:email, :password, :role_id)";
    $stmt1 = $pdo->prepare($sql1);
    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt1->bindParam(":email", $email);
    $stmt1->bindParam(":password", $hashedPwd);
    $stmt1->bindParam(":role_id", $role_id);

    $stmt1->execute();

    $account_id = $pdo->lastInsertId();

    $sql2 = "INSERT INTO user_info (name, number, account_id) VALUES (:name, :number, :account_id)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(":name", $name);
    $stmt2->bindParam(":number", $number);
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

function insert_token(object $pdo, string $email, string $token)
{
    $query = "UPDATE account SET token = :token WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":token", $token);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}


function update_password(object $pdo, string $email, string $password)
{
    $query = "UPDATE account SET password = :password WHERE email = :email";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":password", $hashedPwd);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}


