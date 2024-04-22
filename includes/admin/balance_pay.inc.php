<?php
if (isset($_GET["qr_id"])) {
    try {
        require_once '../dbh.inc.php';
        require_once '../Admin_model.inc.php';
        require_once '../Admin_contr.inc.php';
        require_once '../config.session.inc.php';
        require_once 'qr_code_detail.inc.php';

        $qr_id = htmlspecialchars($_GET["qr_id"]);

        //create new expiration date
        $expiration_date = date('Y-m-d', strtotime('+1 day')); //change to 1 year if final

        //generate unique QR Code
        $generated_qr = generate_qr($pdo);

        //change the registered status
        pay_qr($pdo, $generated_qr, $expiration_date, $qr_id);

        //after paying, generate qr image and email it together with other details
        $result = get_details_qr_payor($pdo, $qr_id);

        $name = $result['first_name'] . " " . $result['last_name'];
        $email = $result['email'];
        $address = "Block " . $result['block'] . ", Lot " . $result['lot'] . ", " . $result['street'] . " Street";
        $qr_code = $result['qr_code'];
        $plate_number = $result['plate_number'];
        $vehicle_type = $result['vehicle_type'];

        save_qr_code($qr_code);

        email_qr_code($name, $email, $address, $plate_number, $vehicle_type);

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
    header("Location: ../../public/view/admin/balance.php?payment=success&name=$name#paid_accounts");

    exit(); // Add exit to stop script execution
} else {
    header("Location: ../../public/view/admin/accounts.php");
    exit(); // Add exit to stop script execution
}

ob_end_flush(); // Move ob_end_flush() to the end of the script
