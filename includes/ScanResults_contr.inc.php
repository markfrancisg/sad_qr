<?php

declare(strict_types=1);

if (isset($_SESSION['vehicle_data_qr_scan'])) {
    $name = $_SESSION['vehicle_data_qr_scan']['name'];
    $address = $_SESSION['vehicle_data_qr_scan']['address'];
    $qr_code = $_SESSION['vehicle_data_qr_scan']['qr_code'];
    $wheel = $_SESSION['vehicle_data_qr_scan']['wheel'];
    $vehicle_type = $_SESSION['vehicle_data_qr_scan']['vehicle_type'];
    $plate_number = $_SESSION['vehicle_data_qr_scan']['plate_number'];

    unset($_SESSION['vehicle_data_qr_scan']);
}
