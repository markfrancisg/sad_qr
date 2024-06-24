<?php

declare(strict_types=1);

function three_input_empty(string $first, string $second, string $third)
{
    if (empty($first) || empty($second) || empty($third)) {
        return true;
    } else {
        return false;
    }
}

function seven_input_empty(string $first, string $second, string $third, string $fourth, string $fifth, string $sixth, string $seventh)
{
    if (empty($first) || empty($second) || empty($third) || empty($fourth) || empty($fifth) || empty($sixth) || empty($seventh)) {
        return true;
    } else {
        return false;
    }
}

function input_has_number(string $input)
{
    $pattern = '/^[a-zA-Z ]+$/';

    // Check if the name matches the pattern
    if (!preg_match($pattern, $input)) {
        return true;
    }
    return false; //if valid

}
