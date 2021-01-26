<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 13:38
 */

namespace App\Core\Traits;


use App\Core\Utils\RespUtil;

trait RespTrait
{

    public function ok($data)
    {
        return RespUtil::ok($data);
    }

    public function bad($data)
    {
        return RespUtil::bad($data);
    }

    public function resp($data, $code)
    {
        return RespUtil::resp($data, $code);
    }
}