<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 17:33
 */

namespace App\Core\Interfaces;


interface WithForm
{
    public static function inputGroups($value = null): array;
}