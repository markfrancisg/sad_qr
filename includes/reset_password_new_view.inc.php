<?php

declare(strict_types=1);

function check_reset_password_errors()
{
    if (isset($_SESSION['empty_input'])) {
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

    if (isset($_SESSION['password_not_match'])) {
        echo '<script>';
        echo 'Swal.fire({
            title: "' . $_SESSION["password_not_match"] . '",
            icon: "error",
            customClass: {
                title: "error-title",
                content: "error-content",
                confirmButton: "error-confirm"
            }
        });';
        echo '</script>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["password_not_match"]);
    }


    if (isset($_SESSION['incorrect_password_format'])) {
        echo '<script>';
        echo 'Swal.fire({
            title: "' . $_SESSION["incorrect_password_format"] . '",
            icon: "error",
            customClass: {
                title: "error-title",
                content: "error-content",
                confirmButton: "error-confirm"
            }
        });';
        echo '</script>';

        // Unset the session variable to avoid showing the alert again on subsequent requests
        unset($_SESSION["incorrect_password_format"]);
    }
}
