<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserEditWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            //'id' => ['numeric', 'exists:users,id', 'required']
            'phone' => ['required', 'string', '', 'max:17', 'min:17'],
            'surname' => ['required', 'string'],
            'name' => ['required', 'string'],
            'father_name' => ['string', 'nullable'],
            'сlass_number' => ['numeric', 'nullable'],
            'сlass_letter' => ['string', 'nullable'],
            'city_area' => ['string', 'required'],
            'school' => ['string', 'required'],
            'subject_id' => ['numeric', 'exists:subjects,id', 'nullable'],
            'region_id' => ['numeric', 'exists:regions,id', 'required'],
        ];
    }
}
