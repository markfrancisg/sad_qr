<?php

declare(strict_types=1);

function check_reset_password_errors()
{
    if (isset($_SESSION["empty_input"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<script>';
        echo 'Swal.fire({
            title: "' . $_SESSION["empty_input"] . '",
            icon: "error",
            customClass: {
                title: "error-title",
                content: "error-content",
                confirmButton: "error-confirm"
            }
        });';
        echo '</script>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["empty_input"]);
    }

    if (isset($_SESSION["email_invalid"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<script>';
        echo 'Swal.fire({
            title: "' . $_SESSION["email_invalid"] . '",
            icon: "error",
            customClass: {
                title: "error-title",
                content: "error-content",
                confirmButton: "error-confirm"
            }
        });';
        echo '</script>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["email_invalid"]);
    }

    if (isset($_SESSION["email_not_found"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<script>';
        echo 'Swal.fire({
            title: "' . $_SESSION["email_not_found"] . '",
            icon: "error",
            customClass: {
                title: "error-title",
                content: "error-content",
                confirmButton: "error-confirm"
            }
        });';
        echo '</script>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["email_not_found"]);
    }


    if (isset($_SESSION["token_not_found"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<script>';
        echo 'Swal.fire({
            title: "' . $_SESSION["token_not_found"] . '",
            icon: "error",
            customClass: {
                title: "error-title",
                content: "error-content",
                confirmButton: "error-confirm"
            }
        });';
        echo '</script>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["token_not_found"]);
    }

    if (isset($_SESSION["invalid_token"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<script>';
        echo 'Swal.fire({
            title: "' . $_SESSION["invalid_token"] . '",
            icon: "error",
            customClass: {
                title: "error-title",
                content: "error-content",
                confirmButton: "error-confirm"
            }
        });';
        echo '</script>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["invalid_token"]);
    }
}

function check_sent_email()
{
    if (isset($_SESSION['password_reset_email']) && !empty($_SESSION['password_reset_email'])) {
        $email = htmlspecialchars($_SESSION['password_reset_email']);
        echo '<script>';
        echo 'Swal.fire({
            title: "Email sent to ' . $email . '",
            icon: "success",
        });';
        echo '</script>';
    }
    unset($_SESSION['password_reset_email']);
}
