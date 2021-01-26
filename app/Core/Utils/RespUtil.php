<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 13:32
 */

namespace App\Core\Utils;


class RespUtil
{
    public static function resp($data, $code)
    {
        return response()->json($data)->setStatusCode($code);
    }

    public static function ok($data)
    {
        return self::resp($data, 200);
    }

    public static function bad($data)
    {
        return self::resp($data, 400);
    }
}