<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 13:47
 */

namespace App\Exceptions;

use Exception;

abstract class BaseException extends Exception
{
    public abstract function getApiResponse();
}