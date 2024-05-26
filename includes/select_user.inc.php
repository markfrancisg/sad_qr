<?php

if (isset($_GET['type'])) {
    require_once 'config.session.inc.php';

    if (isset($_GET['type'])) {
        if ($_GET['type'] == 'admin') {
            $_SESSION['selected_user'] = 'ADMIN';
        } else if ($_GET['type'] == 'guard') {
            $_SESSION['selected_user'] = 'GUARD';
        }
    }

    header('Location: ../login.php');
    exit();
} else {
    header("Location: ../index.php");
    die();
}
