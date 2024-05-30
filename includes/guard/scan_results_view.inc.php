<?php

declare(strict_types=1);

function check_entry()
{
    if (isset($_GET['entry']) && $_GET['entry'] === 'denied') {
        echo '<div class="alert alert-danger" role="alert">';
        echo "Access Denied!";
        echo '</div>';
    }

    if (isset($_GET['entry']) && $_GET['entry'] === 'success') {
        echo '<div class="alert alert-success" role="alert">';
        echo "Access Granted!";
        echo '</div>';
    }
}
