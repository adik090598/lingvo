<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 11.07.2020
 * Time: 23:33
 */

namespace App\Http\Requests;


use App\Core\Interfaces\WithUser;
use App\Core\Traits\ErrorTrait;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest implements WithUser
{
    use ErrorTrait;

    public function authorize()
    {
        return true;
    }

    public function getCurrentUser()
    {
        return auth()->user();
    }

    public function getCurrentUserId()
    {
        return auth()->id();
    }

    public abstract function injectedRules();

    public function rules()
    {
        return $this->injectedRules();
    }
}