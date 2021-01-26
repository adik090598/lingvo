<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Core\Role;
use App\Models\Entities\Region;
use App\Models\Entities\Subject;

class UserWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
        if($value) {
            $array = FormUtil::input('id', 1, null,
                'numeric', true,
                $value->id, null, null, true);
        }
        $regions = Region::all();
        $region_selects = [];

        foreach ($regions as $region) {
            $region_selects[] = ['value' => $region->id, 'title' => $region->name,
                'selected' => $value ? $value->region_id == $region->id ? 'selected' : '' : ''];
        }
        if($value->role_id == Role::LEARNER_ID) {
            $numbers = [];
            for ($i = 1; $i < 12; $i++) {
                $numbers[] = ['value' => $i, 'title' => $i,
                    'selected' => $value ? $value->class_number == $i ? 'selected' : '' : ''];
            }
            return array_merge(
                $array,
                FormUtil::input('surname', 'Тегі', 'Тегі',
                    'text', true, $value ? $value->surname : ''),
                FormUtil::input('name', 'Аты', 'Аты',
                    'text', true, $value ? $value->name : ''),
                FormUtil::input('patronymic', 'Әкесінің аты', 'Әкесінің аты',
                    'text', false, $value ? $value->father_name : ''),
                FormUtil::select('region_id', '', 'Облыс / Қала', true, $region_selects),
                FormUtil::input('city_area', 'Шымкент қаласы, Еңбекші ауданы', 'Аудан / Қала / Ауыл',
                    'text', true, $value ? $value->city_area : ''),
                FormUtil::input('school', '№1 А.С.Пушкин атындағы мектеп - гимназиясы', 'Мектеп',
                    'text', true, $value ? $value->school : ''),
                FormUtil::select('class_number', '', 'Сынып', true, $numbers),
                FormUtil::input('class_letter', 'ABC', 'Сынып әріпі',
                    'text', false, $value ? $value->class_letter : '')

            );
        } else {
            $subjects = Subject::all();
            $subject_selects = [];
            foreach ($subjects as $subject) {
                $subject_selects[] = ['value' => $subject->id, 'title' => $subject->name,
                    'selected' => $value ? $value->subject_id == $subject->id ? 'selected' : '' : ''];
            }
            return array_merge(
                $array,
                FormUtil::input('surname', 'Тегі', 'Тегі',
                    'text', true, $value ? $value->surname : ''),
                FormUtil::input('name', 'Аты', 'Аты',
                    'text', true, $value ? $value->name : ''),
                FormUtil::input('patronymic', 'Әкесінің аты', 'Әкесінің аты',
                    'text', true, $value ? $value->father_name : ''),
                FormUtil::select('region_id', '', 'Облыс / Қала', true, $region_selects),
                FormUtil::input('city_area', 'Аудан / Қала / Ауыл', 'Шымкент қаласы, Еңбекші ауданы',
                    'text', true, $value ? $value->city_area : ''),
                FormUtil::input('school', '№1 А.С.Пушкин атындағы мектеп - гимназиясы', 'Мектеп',
                    'text', true, $value ? $value->school : ''),
                FormUtil::select('subject_id', '', 'Пәні', true, $subject_selects)
            );
        }
    }
}
