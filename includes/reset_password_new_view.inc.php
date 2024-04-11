<?php

declare(strict_types=1);

function check_reset_password_errors()
{
    if (isset($_SESSION["errors_password_reset"])) {
        $errors = $_SESSION["errors_password_reset"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION["errors_password_reset"]);
    }
}
