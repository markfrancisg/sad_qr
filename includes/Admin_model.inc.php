<?php
//require certain data type
declare(strict_types=1);

function get_user_list(object $pdo)
{
    $query = "SELECT email, role_description, name, number 
          FROM account
          INNER JOIN role_info ON account.role_id = role_info.role_id
          INNER JOIN user_info ON account.account_id = user_info.account_id
          WHERE role_info.role_description IN ('guard', 'homeowner')
          ORDER BY name DESC";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function delete_account(object $pdo, string $email)
{
    $query = "DELETE FROM account WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}

// $pdo, $email, $address, $wheel, $vehicle_type, 
function insert_qr(object $pdo, string $address, string $generated_qr, int $wheel, string $vehicle_type, int $account_id)
{
    $query = "INSERT INTO qr_info (address, qr_code, wheel, vehicle_type, account_id) VALUES (:address, :generated_qr, :wheel, :vehicle_type, :account_id)";
    $stmt2 = $pdo->prepare($query);
    $stmt2->bindParam(":address", $address);
    $stmt2->bindParam(":generated_qr", $generated_qr);
    $stmt2->bindParam(":wheel", $wheel);
    $stmt2->bindParam(":vehicle_type", $vehicle_type);
    $stmt2->bindParam(":account_id", $account_id);
    $stmt2->execute();
}

function get_user(object $pdo, string $email)
{
    $query = "SELECT * FROM account WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_qr_list(object $pdo)
{
    $query = "SELECT user_info.name, qr_info.address, qr_info.vehicle_type, qr_info.account_id
          FROM qr_info
          INNER JOIN user_info ON qr_info.account_id = user_info.account_id
          ORDER BY name DESC";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_qr_detail(object $pdo, int $account_id)
{
    $query = "SELECT user_info.name, qr_info.address, qr_info.qr_code, qr_info.wheel, qr_info.vehicle_type, qr_info.account_id
              FROM qr_info
              INNER JOIN user_info ON qr_info.account_id = user_info.account_id
              WHERE qr_info.account_id = :account_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; // Returning single result
}

function get_homeowner_email(object $pdo)
{
    $query = "SELECT email
    FROM account
    INNER JOIN role_info ON account.role_id = role_info.role_id
    WHERE role_info.role_description IN ('homeowner')
    ORDER BY account.email DESC";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
