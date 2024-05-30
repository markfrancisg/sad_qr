<?php

declare(strict_types=1);

function set_station()
{
    if ($_GET['station'] === "a") {
        $_SESSION['station'] = "Station A";
    }

    if ($_GET['station'] === "b") {
        $_SESSION['station'] = "Station B";
    }

    if ($_GET['station'] === "c") {
        $_SESSION['station'] = "Station C";
    }

    if ($_GET['station'] === "d") {
        $_SESSION['station'] = "Station D";
    }
}


