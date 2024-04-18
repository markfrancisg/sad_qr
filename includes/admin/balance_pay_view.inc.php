<?php

declare(strict_types=1);

function payment_success()
{
    if (isset($_GET['payment']) && $_GET['payment'] === 'success' && isset($_GET['name'])) {
        $name = $_GET['name'];
        echo '<script>';
        echo 'Swal.fire({
        title: "QR Code Generated for ' . $name . '!",
        icon: "success"
        });';
        echo '</script>';
    }
}
