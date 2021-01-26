<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 11.07.2020
 * Time: 23:36
 */

namespace App\Http\Requests\Web;


use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;

abstract class WebBaseRequest extends BaseRequest
{
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $messages = '';
        foreach ($errors->getMessages() as $key => $error) {
            foreach ($error as $errorText) {
                $messages .= "$errorText<br />";
            }
        }
        session()->flash('error', $messages);
        $this->webValidatorFail($validator, request()->all());
    }

    public function isStore() {
        return strpos(request()->route()->getName(), 'store');
    }

    public function isDelete() {
        return strpos(request()->route()->getName(), 'delete');
    }

    public function isEdit() {
        return strpos(request()->route()->getName(), 'edit');
    }

    public function isEditOrUpdate() {
        return strpos(request()->route()->getName(), 'edit') || strpos(request()->route()->getName(), 'update');

    }

}
