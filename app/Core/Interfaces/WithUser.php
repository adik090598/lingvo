<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 11.07.2020
 * Time: 23:07
 */

namespace App\Core\Interfaces;


interface WithUser
{
    public function getCurrentUser();

    public function getCurrentUserId();
}