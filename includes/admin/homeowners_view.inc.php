<?php

declare(strict_types=1);

function check_add_homeowner_errors()
{

    // if ($_SESSION["empty_input"] || $_SESSION["email_invalid"] || $_SESSION["login_incorrect"]) {
    if (isset($_SESSION["empty_input"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["empty_input"];
        echo '</div>';
        unset($_SESSION["empty_input"]);
    }

    if (isset($_SESSION["invalid_name"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["invalid_name"];
        echo '</div>';
        unset($_SESSION["invalid_name"]);
    }

    if (isset($_SESSION["email_invalid"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["email_invalid"];
        echo '</div>';
        unset($_SESSION["email_invalid"]);
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

    if (isset($_SESSION["invalid_address"])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["invalid_address"];
        echo '</div>';
        unset($_SESSION["invalid_address"]);
    }
}
