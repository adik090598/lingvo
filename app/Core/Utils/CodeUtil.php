<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 20:16
 */

namespace App\Core\Utils;


class CodeUtil
{
    public static function generateSmsCode($digits): string
    {
        if ($digits < 2) {
            $digits = 2;
        }
        return rand(pow(10, $digits - 1), pow(10, $digits) - 1);
    }
}