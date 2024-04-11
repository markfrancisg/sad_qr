<?php

declare(strict_types=1);

function checkLog()
{
    if (!isset($_SESSION["role_description"]) || !isset($_SESSION['account_id']) || !isset($_SESSION['username'])) {
        header("Location:logout.inc.php");
        exit();
    }
}

function redirectUser()
{
    if (isset($_SESSION["role_description"]) && isset($_SESSION['account_id']) && isset($_SESSION['email'])) {
        if ($_SESSION["role_description"] === 'admin') {
            header("Location: ../public/view/admin/admin.dashboard.php");
            exit();
        } else if ($_SESSION["role_description"] === 'guard') {
            header("Location: ../public/view/guard/guard.dashboard.php");
            exit();
        } elseif ($_SESSION["role_description"] === 'homeowner') {
            header("Location: ../public/view/homeowner/homeowner.dashboard.php");
            exit();
        }
    }
}


function grantPermission(string $role)
{
    if (!isset($_SESSION["role_description"]) || $_SESSION["role_description"] !== $role || !isset($_SESSION['account_id']) || !isset($_SESSION['email'])) {
        header("Location:../../../index.php");
        exit();
    }
}
