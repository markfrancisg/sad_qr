<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

function four_input_empty(string $first, string $second, string $third, string $fourth)
{
    if (empty($first) || empty($second) || empty($third) || empty($fourth)) {
        return true;
    }
    return false;
}

function five_input_empty(string $first, string $second, string $third, string $fourth, string $fifth)
{
    if (empty($first) || empty($second) || empty($third) || empty($fourth) || empty($fifth)) {
        return true;
    }
    return false;
}

function six_input_empty(string $first, string $second, string $third, string $fourth, string $fifth, string $sixth)
{
    if (empty($first) || empty($second) || empty($third) || empty($fourth) || empty($fifth) || empty($sixth)) {
        return true;
    }
    return false;
}

function seven_input_empty(string $first, string $second, string $third, string $fourth, string $fifth, string $sixth, string $seventh)
{
    if (empty($first) || empty($second) || empty($third) || empty($fourth)  || empty($fifth) || empty($sixth) || empty($seventh)) {
        return true;
    }
    return false;
}

function eight_input_empty(string $first, string $second, string $third, string $fourth, string $fifth, string $sixth, string $seventh, string $eight)
{
    if (empty($first) || empty($second) || empty($third) || empty($fourth)  || empty($fifth) || empty($sixth) || empty($seventh) || empty($eight)) {
        return true;
    }
    return false;
}


function input_has_number($input)
{
    $pattern = '/^[a-zA-Z ]+$/';

    // Check if the name matches the pattern
    if (!preg_match($pattern, $input)) {
        return true;
    }
    return false; //if valid

}

function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function is_email_registered(object $pdo, string $email)
{
    if (get_homeowner($pdo, $email)) {
        return true;
    }
    return false;
}

function is_email_registered_except(object $pdo, string $email, $old_email)
{
    if (get_homeowner_except($pdo, $email, $old_email)) {
        return true;
    }
    return false;
}

function input_has_letter($input)
{
    //if it matches, then return true
    if (preg_match('/[a-zA-Z]/', $input)) {
        return true;
    }
    return false;
}

function is_phone_invalid($number)
{
    $pattern = '/^(09|\+639)\d{9}$/';

    // Check if the phone number matches the pattern
    if (!preg_match($pattern, $number)) {
        return true; // Phone number is invalid
    } else {
        return false; // Phone number is valid
    }
}
















function generate_qr(object $pdo)
{
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    do {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, strlen($characters) - 1);
            $result .= $characters[$rand];
        }
        // Check if the generated QR code already exists in the database
        $existing_qr = check_qr_existence($pdo, $result);
    } while ($existing_qr);

    return $result;
}

function check_qr_id()
{
    if (isset($_GET['qr_id'])) {
        $qr_id = $_GET['qr_id'];
        return $qr_id;
    } else {
        header("Location: ../public/view/admin/qr_code.php");
    }
}

function complete_address(string $block, string $lot, string $street)
{
    $complete_address = "";
    $complete_address = "Block " . $block . " ,Lot " .  $lot . " " . $street . " Street";
    return $complete_address;
}

function complete_name(string $first_name, string $last_name)
{
    $complete_name = "";
    $complete_name = $first_name . " " . $last_name;
    return $complete_name;
}

function check_registration_status(object $pdo)
{
    $currentDateTime = date('Y-m-d');

    $result = get_all_registered_vehicle($pdo);

    foreach ($result as $row) {
        $qr_id = intval($row['qr_id']);
        $expiration_date = $row['expiration_date'];
        // Compare expiration date with current date and time
        if ($currentDateTime >= $expiration_date) {
            // Item is expired, update the registration status
            update_registration_status($pdo, $qr_id);
        }
    }
}

function email_qr_code(string $qr_id, string $name, string $email, string $address, string $plate_number, string $vehicle_type)
{

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);


    //Server settings
    $mail->isSMTP();
    //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'argojosafor@gmail.com';                     //SMTP username
    $mail->Password   = 'tuymblznanvyhppt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587;                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('argojosafor@gmail.com');
    $mail->addAddress($email);     //Add a recipient

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    $mail->addAttachment(__DIR__ . '/../public/img/' . $qr_id . '.png'); // Path to the QR image and the desired filename


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Registration Verification'; // Email subject
    $mail->Body    = "Good day, $name!<br><br>"
        . "Thank you for registering. Here are your registration details:<br>"
        . "Name: $name<br>"
        . "Address: $address<br>"
        . "Plate Number: $plate_number<br>"
        . "Vehicle Type: $vehicle_type<br><br>"
        . "Please download and present this QR code when entering the subdivision.<br>"; // Email body
    $mail->send();
}
