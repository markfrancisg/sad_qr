
<?php

function check_create_account_errors()
{
    if (isset($_SESSION["errors_create_account"])) {
        $errors = $_SESSION["errors_create_account"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION["errors_create_account"]);
    } else if (isset($_GET['account_creation']) && $_GET['account_creation'] === "success") {
        echo '<br>';
        echo '<p> Creation Success! </p>';
    }
}
