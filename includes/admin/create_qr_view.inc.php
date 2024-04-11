
<?php

function check_create_qr_errors()
{
    if (isset($_SESSION["errors_create_qr"])) {
        $errors = $_SESSION["errors_create_qr"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION["errors_create_qr"]);
    } else if (isset($_GET['qr_creation']) && $_GET['qr_creation'] === "success") {
        echo '<br>';
        echo '<p> QR Generation Success! </p>';
    }
}
