<?php

declare(strict_types=1);

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
