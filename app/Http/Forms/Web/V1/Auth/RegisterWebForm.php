<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 17:38
 */

namespace App\Http\Forms\Web\V1\Auth;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class RegisterWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {

        return array_merge(
            FormUtil::input('iin', 'Введите ваш ИИН:', 'ИИН', 'text', true),
            FormUtil::input('email', 'Введите ваш email:', 'Email', 'text', true),
            FormUtil::input('password', 'Введите пароль:', 'Пароль', 'password', true),
            FormUtil::input('password_confirmation', 'Подтвердите пароль:', 'Подтвердите пароль:', 'password', true)
        );
    }
}
