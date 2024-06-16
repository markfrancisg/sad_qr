<?php

declare(strict_types=1);

function check_login_errors()
{

    // if ($_SESSION["empty_input"] || $_SESSION["email_invalid"] || $_SESSION["login_incorrect"]) {
    if (isset($_SESSION["empty_input"])) {

        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["empty_input"];
        echo '</div>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["empty_input"]);
    }


    if (isset($_SESSION["email_invalid"])) {

        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["email_invalid"];
        echo '</div>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["email_invalid"]);
    }

    if (isset($_SESSION["login_incorrect"])) {

        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["login_incorrect"];
        echo '</div>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["login_incorrect"]);
    }

    if (isset($_SESSION["unverified_account"])) {

        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["unverified_account"];
        echo '</div>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["unverified_account"]);
    }
}


function check_reset_password()
{
    if (isset($_GET['reset_password']) && !empty($_GET['reset_password']) && $_GET['reset_password'] === 'success') {
        echo '<div id="alertContainer" class="alert alert-success text-center mt-2" role="alert">';
        echo '<i class="fas fa-check-circle"></i> '; // Check icon added here
        echo 'Password reset successful'; // Space added after 'to' for readability
        echo '</div>';
    }
}

function check_set_password()
{
    if (isset($_GET['set_password']) && !empty($_GET['set_password']) && $_GET['set_password'] === 'success') {
        echo '<div id="alertContainer" class="alert alert-success text-center mt-2" role="alert">';
        echo '<i class="fas fa-check-circle"></i> '; // Check icon added here
        echo 'Account verification successful'; // Space added after 'to' for readability
        echo '</div>';
    }
}
