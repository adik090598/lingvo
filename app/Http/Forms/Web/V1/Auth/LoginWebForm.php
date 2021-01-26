<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 17:31
 */

namespace App\Http\Forms\Web\V1\Auth;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class LoginWebForm implements WithForm
{

    public static function inputGroups($value = null): array
    {
        return array_merge(
            FormUtil::input('email', 'Введите email:', 'Email', 'text', true),
            FormUtil::input('password', 'Введите пароль:', 'Пароль', 'password', true)
        );
    }

}