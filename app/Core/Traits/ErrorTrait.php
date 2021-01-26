<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 15:21
 */

namespace App\Core\Traits;


use App\Exceptions\Api\ApiServiceException;
use App\Exceptions\Web\WebServiceException;
use App\Exceptions\Web\WebServiceExplainedException;
use App\Models\Enums\ErrorCode;

trait ErrorTrait
{
    public function apiFail($errors, $code = 400)
    {
        throw new ApiServiceException($errors, $code);
    }

    public function webFail($explanation)
    {
        throw new WebServiceExplainedException($explanation);
    }

    public function webValidatorFail($validator, $inputs, $toRoute = null)
    {
        throw new WebServiceException($validator, $inputs, $toRoute);
    }

    public function adaptedFail($explanation, $code = 400, $errorCode = ErrorCode::INVALID_FIELD)
    {
        if (request()->is('api/*')) {
            $this->apiFail([
                'errors' => [
                    $explanation
                ],
                'errorCode' => $errorCode
            ]);
        } else {
            $this->webFail($explanation);
        }
    }
}