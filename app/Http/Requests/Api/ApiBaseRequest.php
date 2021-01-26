<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 11.07.2020
 * Time: 23:36
 */

namespace App\Http\Requests\Api;


use App\Http\Requests\BaseRequest;
use App\Models\Enums\ErrorCode;
use Illuminate\Contracts\Validation\Validator;

abstract class ApiBaseRequest extends BaseRequest
{
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $messages = array();
        foreach ($errors->getMessages() as $key => $error) {
            foreach ($error as $errorText) {
                $messages[] = $errorText;
            }
        }
        $errorMessage = [
            'errorCode' => ErrorCode::INVALID_FIELD,
            'errors' => $messages
        ];
        $this->apiFail($errorMessage);
    }

}