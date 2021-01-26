<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 13:21
 */

namespace App\Exceptions\Api;

use App\Core\Utils\RespUtil;
use App\Exceptions\BaseException;

class ApiServiceException extends BaseException
{
    protected $errors;
    protected $code;

    /**
     * ApiServiceException constructor.
     * @param $errors
     * @param $code
     */
    public function __construct($errors, $code)
    {
        $this->errors = $errors;
        $this->code = $code;
    }

    public function getApiResponse()
    {
        return RespUtil::resp($this->errors, $this->code);
    }
}