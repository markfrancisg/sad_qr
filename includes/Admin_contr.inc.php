<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



function four_input_empty(string $first, string $second, string $third, string $fourth)
{
    if (empty($first) || empty($second) || empty($third) || empty($fourth)) {
        return true;
    } else {
        return false;
    }
}

function seven_input_empty(string $first, string $second, string $third, string $fourth, string $fifth, string $sixth, string $seventh)
{
    if (empty($first) || empty($second) || empty($third) || empty($fourth)  || empty($fifth) || empty($sixth) || empty($seventh)) {
        return true;
    } else {
        return false;
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
    } else {
        header("Location: ../public/view/admin/qr_code.php");
    }
    return $qr_id;
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

function email_qr_code(string $name, string $email, string $address, string $plate_number, string $vehicle_type)
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
    $mail->addAttachment(__DIR__ . '/../public/img/qr-code.png'); // Path to the QR image and the desired filename


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Registration Verification'; // Email subject
    $mail->Body    = "Good day, $name!<br><br>"
        . "Thank you for registering. Here are your registration details:<br>"
        . "Name: $name<br>"
        . "Address: $address<br>"
        . "Plate Number: $plate_number<br>"
        . "Vehicle Type: $vehicle_type<br><br>"
        . "Please download your QR code for entering the subdivision.<br>"; // Email body
    $mail->send();
}
