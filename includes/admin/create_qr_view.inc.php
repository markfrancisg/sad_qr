<?php

declare(strict_types=1);
function check_create_vehicle_errors()
{
    if (isset($_SESSION["empty_input"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["empty_input"];
        echo '</div>';
        unset($_SESSION["empty_input"]);
    }

    if (isset($_SESSION["not_registered"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["not_registered"];
        echo '</div>';
        unset($_SESSION["not_registered"]);
    }

    if (isset($_SESSION["invalid_format"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["invalid_format"];
        echo '</div>';
        unset($_SESSION["invalid_format"]);
    }
}

function creation_success()
{
    if (isset($_GET['vehicle_creation']) && $_GET['vehicle_creation'] === 'success' && isset($_GET['email'])) {
        $email = $_GET['email'];
        echo '<div class="alert alert-success" role="alert">';
        echo "Vehicle added for $email!";
        echo '</div>';
    }
}
