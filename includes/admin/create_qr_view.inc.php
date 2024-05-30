<?php

declare(strict_types=1);
function check_create_vehicle_errors()
{
    if (isset($_SESSION["empty_input"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["empty_input"];
        echo '</div>';

        unset($_SESSION["empty_input"]);
    }

    if (isset($_SESSION["not_registered"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["not_registered"];
        echo '</div>';

        unset($_SESSION["not_registered"]);
    }

    if (isset($_SESSION["invalid_format"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["invalid_format"];
        echo '</div>';

        unset($_SESSION["invalid_format"]);
    }
}

function creation_success()
{
    if (isset($_GET['vehicle_creation']) && $_GET['vehicle_creation'] === 'success' && isset($_SESSION['qr_email']) && !empty($_SESSION['qr_email'])) {
        $email = htmlspecialchars($_SESSION['qr_email']);
        echo '<div id="alertContainer" class="alert alert-success text-center mt-2" role="alert">';
        echo '<i class="fas fa-check-circle"></i> '; // Check icon added here
        echo  'Vehicle Registered successfully for ' . $email; // Space added after 'to' for readability
        echo '</div>';
        unset($_SESSION["qr_email"]);
    }
}
