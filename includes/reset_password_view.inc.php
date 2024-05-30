<?php

declare(strict_types=1);

function check_reset_password_errors()
{
    if (isset($_SESSION["empty_input"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["empty_input"];
        echo '</div>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["empty_input"]);
    }

    if (isset($_SESSION["email_invalid"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["email_invalid"];
        echo '</div>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["email_invalid"]);
    }

    if (isset($_SESSION["email_not_found"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["email_not_found"];
        echo '</div>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["email_not_found"]);
    }


    if (isset($_SESSION["token_not_found"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["token_not_found"];
        echo '</div>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["token_not_found"]);
    }

    if (isset($_SESSION["invalid_token"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["invalid_token"];
        echo '</div>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["invalid_token"]);
    }

    if (isset($_SESSION["token_expired"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["token_expired"];
        echo '</div>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["token_expired"]);
    }
}

function check_sent_email()
{
    if (isset($_SESSION['password_reset_email']) && !empty($_SESSION['password_reset_email'])) {
        $email = htmlspecialchars($_SESSION['password_reset_email']);
        echo '<div id="alertContainer" class="alert alert-success text-center mt-2" role="alert">';
        echo '<i class="fas fa-check-circle"></i> '; // Check icon added here
        echo 'Email sent to ' . $email; // Space added after 'to' for readability
        echo '</div>';
    }
    unset($_SESSION['password_reset_email']);
}
