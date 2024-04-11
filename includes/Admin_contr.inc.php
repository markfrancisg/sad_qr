<?php

declare(strict_types=1);

function four_input_empty(string $first, string $second, string $third, string $fourth)
{
    if (empty($first) || empty($second) || empty($third) || empty($fourth)) {
        return true;
    } else {
        return false;
    }
}


function generate_qr()
{
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, strlen($characters) - 1);
        $result .= $characters[$rand];
    }
    return $result;
    //kulang pa ng validation, check if may identical na random number
}

function check_account_id()
{
    if (isset($_GET['account_id'])) {
        $account_id = $_GET['account_id'];
    } else {
        header("Location: ../public/view/admin/qr_code.php");
    }
    return $account_id;
}
