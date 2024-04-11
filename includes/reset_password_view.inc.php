<?php

declare(strict_types=1);

function check_reset_password_errors()
{
    if (isset($_SESSION["errors_reset_password"])) {
        $errors = $_SESSION["errors_reset_password"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION["errors_reset_password"]);
    } else if (isset($_SESSION["password_reset_email"])) {
        echo '<br>';
        echo '<p> Email Sent! </p>';
        unset($_SESSION["password_reset_email"]);
    }
}
