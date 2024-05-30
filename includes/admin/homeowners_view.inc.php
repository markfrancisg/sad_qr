<?php

declare(strict_types=1);

function check_add_homeowner_errors()
{
    // if ($_SESSION["empty_input"] || $_SESSION["email_invalid"] || $_SESSION["login_incorrect"]) {
    if (isset($_SESSION["empty_input"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["empty_input"];
        echo '</div>';


        unset($_SESSION["empty_input"]);
    }

    if (isset($_SESSION["invalid_name"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["invalid_name"];
        echo '</div>';


        unset($_SESSION["invalid_name"]);
    }

    if (isset($_SESSION["email_invalid"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["email_invalid"];
        echo '</div>';


        unset($_SESSION["email_invalid"]);
    }

    if (isset($_SESSION["email_registered"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["email_registered"];
        echo '</div>';


        unset($_SESSION["email_registered"]);
    }

    if (isset($_SESSION["invalid_number"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["invalid_number"];
        echo '</div>';


        unset($_SESSION["invalid_number"]);
    }

    if (isset($_SESSION["invalid_address"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["invalid_address"];
        echo '</div>';


        unset($_SESSION["invalid_address"]);
    }
}

function creation_success()
{
    if (isset($_GET['homeowner_creation']) && $_GET['homeowner_creation'] === 'success') {
        echo '<div id="alertContainer" class="alert alert-success text-center mt-2" role="alert">';
        echo '<i class="fas fa-check-circle"></i> '; // Check icon added here
        echo 'Homeowner Added Successfully'; // Space added after 'to' for readability
        echo '</div>';
    }
}
