
<?php

function check_create_account_errors()
{
    if (isset($_SESSION["empty_input"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["empty_input"];
        echo '</div>';


        unset($_SESSION["empty_input"]);
    }
    if (isset($_SESSION["name_wrong"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["name_wrong"];
        echo '</div>';


        unset($_SESSION["name_wrong"]);
    }
    if (isset($_SESSION["invalid_email"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["invalid_email"];
        echo '</div>';


        unset($_SESSION["invalid_email"]);
    }
    if (isset($_SESSION["email_registered"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["email_registered"];
        echo '</div>';

        unset($_SESSION["email_registered"]);
    }
    if (isset($_SESSION["invalid_number"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["invalid_number"];
        echo '</div>';



        unset($_SESSION["invalid_number"]);
    }
}

function account_creation_success()
{
    if (isset($_GET['account_creation']) && $_GET['account_creation'] === "success") {
        echo '<div id="alertContainer" class="alert alert-success text-center mt-2" role="alert">';
        echo '<i class="fas fa-check-circle"></i> '; // Check icon added here
        echo 'A new account is added'; // Space added after 'to' for readability
        echo '</div>';
    }
}
