<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Category;
use App\Models\Entities\Subject;

class QuizWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
        if($value) {
            $array = FormUtil::input('id', 1, null,
                'numeric', true,
                $value->id, null, null, true);
        }
        $subjects = Subject::all();
        $subject_selects = [];
        foreach ($subjects as $subject) {
            $subject_selects[] = ['value' => $subject->id, 'title' => $subject->name,
                'selected' => $value ? $value->subject_id == $subject->id ? 'selected' : '' : ''];
        }

        $role_selectes = [];
        $role_selectes[] = ['value' => 2, 'title' => 'Ученик',
                'selected' => $value ? $value->role_id == 2 ? 'selected' : '' : ''];
        $role_selectes[] = ['value' => 3, 'title' => 'Преподователь',
            'selected' => $value ? $value->role_id == 3 ? 'selected' : '' : ''];
        return array_merge(
            $array,

            FormUtil::input('name', 'Тест по физике', 'Название',
                'text', false, $value ? $value->name : ''),

            FormUtil::input('image', '', 'Фото',
                'file', !$value ? true : false),

            FormUtil::input('description', 'Описание для теста', 'Описание',
                'text', false, $value ? $value->description : ''),

            FormUtil::input('limit', '20', 'Количество вопросов',
                'number', false, $value ? $value->limit : ''),
            FormUtil::input('duration', 'Время в минутах', 'Продолжительность теста',
                'number', false, $value ? $value->duration : ''),
            FormUtil::select('subject_id', '', 'Предмет', true, $subject_selects),

            FormUtil::select('role_id', '', 'Роль', true, $role_selectes),

            FormUtil::input('price', '1800', 'Стоимость',
                'number', false, $value ? $value->price : ''),

            FormUtil::input('start_date', '', 'Дата начало',
                'date', false, $value ? $value->start_date : ''),
            FormUtil::input('end_date', '', 'Дата окончания',
                'date', false, $value ? $value->end_date : ''),

            FormUtil::input('major_place', '', 'Балл за гранпри ( 20 > )',
                'number', false, $value ? $value->major_place : ''),
            FormUtil::input('major_place_certificate', '', 'Сертификат за гранпри',
                'file', !$value ? true : false, $value ? $value->major_place : ''),

            FormUtil::input('first_place', '', 'Балл за первое место ( 15 > )',
                'number', true, $value ? $value->first_place : ''),
            FormUtil::input('first_place_certificate', '', 'Сертификат за первое место',
                'file', !$value ? true : false, $value ? $value->first_place : ''),

            FormUtil::input('second_place', '', 'Балл за второе место ( 10 > )' ,
                'number', true, $value ? $value->second_place : ''),
            FormUtil::input('second_place_certificate', '', 'Сертификат за второе место',
                'file', !$value ? true : false),

            FormUtil::input('third_place', '', 'Балл за третье место ( 5 > )',
                'number', true, $value ? $value->third_place : ''),
            FormUtil::input('third_place_certificate', '', 'Сертификат за третье место',
                'file', !$value ? true : false),

            FormUtil::input('default_certificate', '', 'Сертификат за участье',
                'file', !$value ? true : false),

            FormUtil::input('documents[]', '', 'Правила участия', 'file',
                false, '',true, '', '', false)
        );
    }
}
