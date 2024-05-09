<?php

declare(strict_types=1);
function visitor_message()
{
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

    if (isset($_GET['visitor_creation']) && $_GET['visitor_creation'] === 'success') {
        echo '<div class="alert alert-success" role="alert">';
        echo "New visitor recorded!";
        echo '</div>';
    }
}
