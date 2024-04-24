<?php

declare(strict_types=1);

// function checkLog()
// {
//     if (!isset($_SESSION["role_description"]) || !isset($_SESSION['account_id']) || !isset($_SESSION['username'])) {
//         header("Location:logout.inc.php");
//         exit();
//     }
// }


//if user logs in and goes back to login page, 
function redirectUser()
{
    if (isset($_SESSION["role_description"]) && isset($_SESSION['account_id']) && isset($_SESSION['account_email'])) {
        if ($_SESSION["role_description"] === 'admin') {
            header("Location: ../public/view/admin/admin.dashboard.php");
            exit();
        } else if ($_SESSION["role_description"] === 'guard') {
            header("Location: ../public/view/guard/guard.dashboard.php");
            exit();
        }
    }
}

// for reset and resetconfirm pages
function redirectUserReset()
{
    if (isset($_SESSION["role_description"]) && isset($_SESSION['account_id']) && isset($_SESSION['account_email'])) {
        if ($_SESSION["role_description"] === 'admin') {
            header("Location: admin/admin.dashboard.php");
            exit();
        } else if ($_SESSION["role_description"] === 'guard') {
            header("Location: guard/guard.dashboard.php");
            exit();
        }
    }
}



//if user tries to access page directly without loggin in
function grantPermission(string $role)
{
    if (!isset($_SESSION["role_description"]) || $_SESSION["role_description"] !== $role || !isset($_SESSION['account_id']) || !isset($_SESSION['account_email'])) {
        header("Location:../../../index.php");
        exit();
    }
}
