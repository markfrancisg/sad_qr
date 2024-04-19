
<?php

function check_create_account_errors()
{
    if (isset($_SESSION["empty_input"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["empty_input"];
        echo '</div>';
        unset($_SESSION["empty_input"]);
    }
    if (isset($_SESSION["name_wrong"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["name_wrong"];
        echo '</div>';
        unset($_SESSION["name_wrong"]);
    }
    if (isset($_SESSION["invalid_email"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["invalid_email"];
        echo '</div>';
        unset($_SESSION["invalid_email"]);
    }
    if (isset($_SESSION["email_registered"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["email_registered"];
        echo '</div>';
        unset($_SESSION["email_registered"]);
    }
    if (isset($_SESSION["invalid_number"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["invalid_number"];
        echo '</div>';
        unset($_SESSION["invalid_number"]);
    }
}

function account_creation_success()
{
    if (isset($_GET['account_creation']) && $_GET['account_creation'] === "success") {
        echo '<div class="alert alert-success" role="alert">';
        echo "A new account is added";
        echo '</div>';
    }
}
