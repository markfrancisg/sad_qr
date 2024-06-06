<?php

declare(strict_types=1);
function visitor_error_message()
{
    if (isset($_SESSION["empty_input"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["empty_input"];
        echo '</div>';


        unset($_SESSION["empty_input"]);
    }

    if (isset($_SESSION["invalid_name"])) {
        echo '<div id="alertContainer" class="alert alert-danger text-center mt-2" role="alert">';
        echo '<i class="fas fa-times-circle"></i> ';
        echo $_SESSION["invalid_name"];
        echo '</div>';

        unset($_SESSION["invalid_name"]);
    }
}

function visitor_success_message()
{
    if (isset($_GET['visitor_creation']) && $_GET['visitor_creation'] === 'success') {
        echo '<div id="alertContainer" class="alert alert-success text-center mt-2" role="alert">';
        echo '<i class="fas fa-check-circle"></i> '; // Check icon added here
        echo 'New Visitor Added Successfully'; // Space added after 'to' for readability
        echo '</div>';
    }
}
