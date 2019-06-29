<?php

declare(strict_types=1);

function arabic_to_roman($arabic_number) : string
{
    if ($arabic_number < 0) {
        return "Ты ввел отрицательное число, не делай так больше!!!";
    }
    if (($arabic_number / intval($arabic_number)) > 1) {
        return "Ты ввел число, но не целое, не делай так больше!!!";
    }
    if (!is_numeric($arabic_number)) {
        return "Ты ввел совсем не целое число, не делай так больше!!!";
    }
    if ($arabic_number == 0) {
        return "0";
    }
    $thousands = (int)($arabic_number / 1000);
    $arabic_number -= $thousands * 1000;
    $roman_number = str_repeat("M", $thousands);
    $roman_numbers = [
        900 => "CM",
        500 => "D",
        400 => "CD",
        100 => "C",
        90 => "XC",
        50 => "L",
        40 => "XL",
        10 => "X",
        9 => "IX",
        5 => "V",
        4 => "IV",
        1 => "I"
    ];
    while ($arabic_number !== 0) {
        foreach ($roman_numbers as $arabic_key => $roman_value) {
            if ($arabic_key <= $arabic_number) {
                break;
            }
        }
        $amount = (int)($arabic_number / $arabic_key);
        $arabic_number -= $arabic_key * $amount;
        $roman_number .= str_repeat($roman_value, $amount);
    }
    return $roman_number;
}