<?php

declare(strict_types=1);

function check_login_errors()
{

    // if ($_SESSION["empty_input"] || $_SESSION["email_invalid"] || $_SESSION["login_incorrect"]) {
    if (isset($_SESSION["empty_input"])) {
        // Output JavaScript code to show SweetAlert if the session variable is set
        echo '<script>';
        echo 'Swal.fire({
            title: "Fill in all fields!",
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
        echo '<script>';
        echo 'Swal.fire({
            title: "Invalid email!",
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

    if (isset($_SESSION["login_incorrect"])) {
        echo '<script>';
        echo 'Swal.fire({
            title: "Incorrect login credentials!",
            icon: "error",
            customClass: {
                title: "error-title",
                content: "error-content",
                confirmButton: "error-confirm"
            }
        });';
        echo '</script>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["login_incorrect"]);
    }
}
