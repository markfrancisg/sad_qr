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
function insert_qr(object $pdo, string $wheel, string $vehicle_color, string $vehicle_type, string $plate_number, int $ho_id)
{
    $query = "INSERT INTO qr_info (wheel, vehicle_type, vehicle_color, plate_number, ho_id) VALUES (:wheel, :vehicle_type, :vehicle_color, :plate_number, :ho_id)";
    $stmt2 = $pdo->prepare($query);


    $stmt2->bindParam(":wheel", $wheel);
    $stmt2->bindParam(":vehicle_type", $vehicle_type);
    $stmt2->bindParam(":vehicle_color", $vehicle_color);
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

function get_homeowner_name(object $pdo, string $email)
{
    $query = "SELECT first_name, last_name FROM homeowners WHERE email = :email;";
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

function get_homeowner_except(object $pdo, string $email, string $old_email)
{
    // Prepare SQL query to select account emails excluding the old email
    $query = "SELECT email FROM homeowners WHERE email = :email AND email != :old_email LIMIT 1;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":old_email", $old_email);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function update_homeowner(PDO $pdo, string $first_name, string $last_name, string $email, string $number, string $block, string $lot, string $street, string $old_email)
{
    // SQL query to update homeowner details
    $sql = "UPDATE homeowners 
            SET first_name = :first_name, 
                last_name = :last_name, 
                email = :email, 
                number = :number, 
                block = :block, 
                lot = :lot, 
                street = :street 
            WHERE email = :old_email";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":first_name", $first_name, PDO::PARAM_STR);
    $stmt->bindParam(":last_name", $last_name, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":number", $number, PDO::PARAM_STR);
    $stmt->bindParam(":block", $block, PDO::PARAM_STR);
    $stmt->bindParam(":lot", $lot, PDO::PARAM_STR);
    $stmt->bindParam(":street", $street, PDO::PARAM_STR);
    $stmt->bindParam(":old_email", $old_email, PDO::PARAM_STR);

    // Execute the query and return true if successful, false otherwise
    return $stmt->execute();
}

function update_vehicle(PDO $pdo, string $id, string $vehicle_type, string $plate_number, string $wheel)
{
    // SQL query to update homeowner details
    $sql = "UPDATE qr_info 
            SET vehicle_type = :vehicle_type, 
                plate_number = :plate_number, 
                wheel = :wheel
            WHERE qr_id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":vehicle_type", $vehicle_type, PDO::PARAM_STR);
    $stmt->bindParam(":plate_number", $plate_number, PDO::PARAM_STR);
    $stmt->bindParam(":wheel", $wheel, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_STR);

    // Execute the query and return true if successful, false otherwise
    return $stmt->execute();
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

function count_homeowners(object $pdo)
{
    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) as count FROM homeowners";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['count'];
}

function count_vehicles(object $pdo)
{
    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) as count FROM qr_info";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['count'];
}

function count_paid_vehicles(object $pdo)
{
    // Prepare the SQL statement with the WHERE clause
    $sql = "SELECT COUNT(*) as count FROM qr_info WHERE registered = 1";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['count'];
}

function count_unpaid_vehicles(object $pdo)
{
    // Prepare the SQL statement with the WHERE clause
    $sql = "SELECT COUNT(*) as count FROM qr_info WHERE registered = 0";

    // Prepare and execute the SQL statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['count'];
}

function count_log_daily(object $pdo)
{
    // Set the timezone and get the current date
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    // Prepare the SQL statement with a WHERE clause to filter by the current date
    $sql = "SELECT COUNT(*) as count FROM log WHERE DATE(date) = :current_date";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind the current date parameter
    $stmt->bindParam(':current_date', $current_date);

    // Execute the SQL statement
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['count'];
}

function count_log_weekly(PDO $pdo): int
{
    // Set the timezone and get the current date
    date_default_timezone_set('Asia/Manila');
    $current_date = date('Y-m-d');

    // Calculate the start of the week (Monday)
    $start_of_week = date('Y-m-d', strtotime('monday this week'));

    // Prepare the SQL statement with a WHERE clause to filter by the current week
    $sql = "SELECT COUNT(*) as count FROM log WHERE DATE(date) BETWEEN :start_of_week AND :current_date";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind the date parameters
    $stmt->bindParam(':start_of_week', $start_of_week);
    $stmt->bindParam(':current_date', $current_date);

    // Execute the SQL statement
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the count value
    return $result['count'];
}

function get_specified_homeowner(PDO $pdo, string $email): array
{
    $query = "SELECT email, first_name, last_name, number, block, lot, street 
              FROM homeowners 
              WHERE email = :email";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function get_specified_vehicle(PDO $pdo, string $id): array
{
    $query = "SELECT email, wheel, vehicle_type, plate_number 
              FROM qr_info
              INNER JOIN homeowners ON qr_info.ho_id = homeowners.ho_id
              WHERE qr_info.qr_id = :id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function check_email_status(PDO $pdo, string $email)
{
    $stmt = $pdo->prepare("SELECT ho_id 
                           FROM homeowners 
                           WHERE email = ?");
    $stmt->execute([$email]);

    return $rowCount = $stmt->rowCount();
}


function check_plate_number_status(PDO $pdo, string $plate_number)
{
    $stmt = $pdo->prepare("SELECT qr_id 
                           FROM qr_info 
                           WHERE plate_number = ?");
    $stmt->execute([$plate_number]);

    return $rowCount = $stmt->rowCount();
}

function delete_homeowner($pdo, $ho_id)
{
    $query = "DELETE FROM homeowners WHERE ho_id = :ho_id";
    $statement = $pdo->prepare($query);
    $statement->execute([':ho_id' => $ho_id]);
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
