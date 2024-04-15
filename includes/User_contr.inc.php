<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function is_input_empty(string $first)
{
    if (empty($first)) {
        return true;
    } else {
        return false;
    }
}

function two_input_empty(string $first, string $second)
{
    if (empty($first) || empty($second)) {
        return true;
    } else {
        return false;
    }
}

function three_input_empty(string $first, string $second, string $third)
{
    if (empty($first) || empty($second) || empty($third)) {
        return true;
    } else {
        return false;
    }
}

function five_input_empty(string $first, string $second, string $third, string $fourth, string $fifth)
{
    if (empty($first) || empty($second) || empty($third) || empty($fourth) || empty($fifth)) {
        return true;
    } else {
        return false;
    }
}

function is_match(string $first_input, string $second_input)
{
    if ($first_input !== $second_input) {
        return true;
    } else {
        return false;
    }
}

function is_email_wrong(bool|array $result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/';
    if (!preg_match($pattern, $email)) {
        return true; // Email doesn't match the pattern
    }
    return false;
}



function is_password_wrong($password, $hashedPwd)
{
    if (!password_verify($password, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}



function is_name_wrong($name)
{
    $pattern = '/^[a-zA-Z ]+$/';

    // Check if the name matches the pattern
    if (!preg_match($pattern, $name)) {
        return true;
    } else {
        return false; //if valid
    }
}

function is_email_registered(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function is_number_valid(string $number)
{
    $pattern = '/^(09|\+639)\d{9}$/';

    // Check if the phone number matches the pattern
    if (!preg_match($pattern, $number)) {
        return true; // Phone number is valid
    } else {
        return false; // Phone number is invalid
    }
}

function create_user(object $pdo, string $role_id, string $email, string $first_name, string $last_name, string $number)
{
    //     set_user($pdo, $username, $password, $email);
    $name = $first_name . " " . $last_name;

    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $randomString1 = '';
    $maxIndex = strlen($characters) - 1;
    for ($i = 0; $i < 8; $i++) {
        $randomString1 .= $characters[rand(0, $maxIndex)]; //generate a random password numbers and letters
    }

    $password = $randomString1;

    set_account($pdo, $email, $password, $role_id, $name, $number);

    send_password_email($name, $email, $password);
}

function get_role_id(object $pdo, string $role_description)
{
    return searchRoleId($pdo, $role_description);
}


function send_password_email(string $name, string $email, string $password)
{

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();
        //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'argojosafor@gmail.com';                     //SMTP username
        $mail->Password   = 'tuymblznanvyhppt';                               //SMTP password
        $mail->SMTPSecure = 'ssl';
        //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('argojosafor@gmail.com');
        $mail->addAddress($email);     //Add a recipient

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Registration Verification';
        $mail->Body    = 'Good day, ' . $name . '! <br> 
        <b>Password: </b>' . $password . '<br> For your safety, please do not share this link to anyone.';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function generate_token(object $pdo, string $email)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $randomString1 = '';
    $token = '';
    $maxIndex = strlen($characters) - 1;
    for ($i = 0; $i < 8; $i++) {
        $randomString1 .= $characters[rand(0, $maxIndex)]; //generate a random password numbers and letters
    }
    $token = md5($randomString1);

    insert_token($pdo, $email, $token);

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'argojosafor@gmail.com';
        $mail->Password   = 'tuymblznanvyhppt';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->setFrom('argojosafor@gmail.com');
        $mail->addAddress($email);     //Add a recipient

        $mail->isHTML(true);
        $mail->Subject = 'Reset Password';
        $mail->Body = 'Good day! <br>
        <h2>You are receiving this email because we received a password reset request from your account</h2>
        <br>
        <br>
        <a href="http://localhost:3000/public/view/reset_password_confirm.php?token=' . $token . '&email=' . $email . '">Reset Password</a>';
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function verify_token(string $token, bool | string $token_checker)
{
    if ($token !== $token_checker) {
        return true;
    }
    return false;
}
