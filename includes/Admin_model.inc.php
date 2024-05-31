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

function get_admin_details(object $pdo, int $account_id)
{
    $query = "SELECT account_email, role_description, account_first_name,account_last_name, account_number 
          FROM account
          INNER JOIN role_info ON account.role_id = role_info.role_id
          INNER JOIN user_info ON account.account_id = user_info.account_id
          WHERE account.account_id = $account_id;
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

// $pdo, $email, $address, $wheel, $vehicle_type, , string $generated_qr
function insert_qr(object $pdo, string $wheel, string $vehicle_type, string $plate_number, int $ho_id)
{
    $query = "INSERT INTO qr_info ( wheel, vehicle_type, plate_number, ho_id) VALUES ( :wheel, :vehicle_type, :plate_number, :ho_id)";
    $stmt2 = $pdo->prepare($query);
    // $stmt2->bindParam(":generated_qr", $generated_qr);
    $stmt2->bindParam(":wheel", $wheel);
    $stmt2->bindParam(":vehicle_type", $vehicle_type);
    $stmt2->bindParam(":plate_number", $plate_number);
    $stmt2->bindParam(":ho_id", $ho_id);
    $stmt2->execute();
}

function get_user(object $pdo, string $email)
{
    $query = "SELECT * FROM account WHERE account_email = :account_email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":account_email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_qr_list(object $pdo, int $offset, int $total_records_per_page)
{
    $query = "SELECT homeowners.first_name, homeowners.last_name, homeowners.block, homeowners.lot, homeowners.street, qr_info.vehicle_type, qr_info.plate_number, qr_info.qr_id, qr_info.registered
          FROM qr_info
          INNER JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
          ORDER BY qr_info.qr_id DESC
          LIMIT $offset, $total_records_per_page";

    //newest to oldest

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_qr_detail(object $pdo, int $qr_id)
{
    $query = "SELECT homeowners.first_name, homeowners.last_name, homeowners.block, homeowners.lot, homeowners.street, qr_info.qr_code, qr_info.plate_number, qr_info.wheel, qr_info.vehicle_type, qr_info.ho_id
              FROM qr_info
              INNER JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              WHERE qr_info.qr_id = :qr_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':qr_id', $qr_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; // Returning single result
}

function get_homeowner_email(object $pdo)
{
    $query = "SELECT email
    FROM homeowners";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function insert_homeowner(object $pdo, string $first_name, string $last_name, string $email, string $number, string $block, string $lot, string $street)
{
    $query = "INSERT INTO homeowners (first_name, last_name, email, number, block, lot, street) VALUES (:first_name, :last_name, :email, :number, :block, :lot, :street)";
    $stmt2 = $pdo->prepare($query);
    $stmt2->bindParam(":first_name", $first_name);
    $stmt2->bindParam(":last_name", $last_name);
    $stmt2->bindParam(":email", $email);
    $stmt2->bindParam(":number", $number);
    $stmt2->bindParam(":block", $block);
    $stmt2->bindParam(":lot", $lot);
    $stmt2->bindParam(":street", $street);
    $stmt2->execute();
}

function get_homeowner_address(object $pdo, string $email)
{
    $query = "SELECT block, lot, street FROM homeowners WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function get_homeowner(object $pdo, string $email)
{
    $query = "SELECT * FROM homeowners WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_unpaid_qr(object $pdo, int $offset, int $total_records_per_page)
{
    $query = "SELECT homeowners.first_name, homeowners.last_name, homeowners.block, homeowners.lot, homeowners.street, qr_info.vehicle_type, qr_info.plate_number, qr_info.qr_id, qr_info.registered
              FROM qr_info
              INNER JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              WHERE qr_info.registered = 0
              ORDER BY qr_info.qr_id DESC
              LIMIT $offset, $total_records_per_page";


    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_paid_qr(object $pdo, int $offset, int $total_records_per_page)
{
    $query = "SELECT homeowners.first_name, homeowners.last_name, homeowners.block, homeowners.lot, homeowners.street, qr_info.vehicle_type, qr_info.plate_number, qr_info.qr_id, qr_info.registered
              FROM qr_info
              INNER JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              WHERE qr_info.registered = 1
              ORDER BY qr_info.qr_id DESC
              LIMIT $offset, $total_records_per_page";


    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


function pay_qr(object $pdo, string $generated_qr, string $expiration_date, int $qr_id)
{
    $query = "UPDATE qr_info SET qr_code = :generated_qr, expiration_date = :expiration_date, registered = 1 WHERE qr_id = :qr_id";
    $stmt2 = $pdo->prepare($query);
    $stmt2->bindParam(":generated_qr", $generated_qr); // Assuming $generated_qr is the QR code to be updated
    $stmt2->bindParam(":expiration_date", $expiration_date); // Assuming $expiration_date is the expiration date
    $stmt2->bindParam(":qr_id", $qr_id); // Assuming $qr_id is the ID of the QR code to update

    $stmt2->execute();
}

function get_all_registered_vehicle(object $pdo)
{
    $query = "SELECT * FROM qr_info";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
}

function update_registration_status(object $pdo, int $qr_id)
{
    $query = "UPDATE qr_info SET registered = 0, qr_code = 'Not Registered', expiration_date = NULL WHERE qr_id = :qr_id";
    $stmt2 = $pdo->prepare($query);
    $stmt2->bindParam(":qr_id", $qr_id);

    $stmt2->execute();
}

function check_qr_existence(object $pdo, string $qr)
{
    $query = "SELECT qr_code FROM qr_info WHERE qr_code = :qr";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':qr' => $qr]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_details_qr_payor(object $pdo, int $qr_id)
{
    $query = "SELECT homeowners.first_name, homeowners.last_name, homeowners.email, homeowners.block,homeowners.lot, homeowners.street, qr_info.qr_code, qr_info.plate_number, qr_info.vehicle_type
              FROM qr_info
              INNER JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              WHERE qr_info.qr_id = :qr_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':qr_id', $qr_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; // Returning single result
}

//for admin dashboard
function get_account_list(object $pdo)
{
    $query = "SELECT account.account_email, user_info.account_first_name, user_info.account_last_name
            FROM account
            JOIN user_info ON account.account_id = user_info.account_id
            ORDER BY account.account_id DESC
            LIMIT 5";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_five_paid_qr(object $pdo)
{
    $query = "SELECT homeowners.first_name,homeowners.last_name, homeowners.block, homeowners.lot, homeowners.street
              FROM qr_info
              INNER JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              WHERE qr_info.registered = 1
              ORDER BY qr_info.qr_id DESC
              LIMIT 5";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_five_unpaid_qr(object $pdo)
{
    $query = "SELECT homeowners.first_name,homeowners.last_name, homeowners.block, homeowners.lot, homeowners.street
              FROM qr_info
              INNER JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              WHERE qr_info.registered = 0
              ORDER BY qr_info.qr_id DESC
              LIMIT 5";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_admin_name(object $pdo, string $account_email)
{
    $query = "SELECT user_info.account_first_name, user_info.account_last_name  FROM account 
            JOIN user_info ON account.account_id = user_info.account_id
            WHERE account_email = :account_email";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':account_email' => $account_email]);

    // Directly return the account name using fetchColumn
    return $stmt->fetchColumn(0);
}

function count_qr_list(object $pdo)
{
    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) as qr_count FROM qr_info";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['qr_count'];
}
