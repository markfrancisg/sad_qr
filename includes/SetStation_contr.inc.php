<?php

declare(strict_types=1);

function set_station()
{
    if ($_GET['station'] === "a") {
        $_SESSION['station'] = "Gate 1";
    }

    if ($_GET['station'] === "b") {
        $_SESSION['station'] = "Gate 2";
    }

    if ($_GET['station'] === "c") {
        $_SESSION['station'] = "Gate 3";
    }

    if ($_GET['station'] === "d") {
        $_SESSION['station'] = "Gate 4";
    }
}


