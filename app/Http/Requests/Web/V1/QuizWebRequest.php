<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class QuizWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'start_date' => ['date', 'nullable'],
            'end_date' => ['date', 'nullable'],
            'is_enable' => ['boolean'],
            'major_place' => ['numeric', 'nullable'],
            'first_place' => ['numeric', 'required'],
            'second_place' => ['numeric', 'required'],
            'third_place' => ['numeric', 'required',],
            'major_place_certificate' => ['image'],
            'first_place_certificate' => ['image', !$this->isEditOrUpdate() ? 'required' : ''],
            'second_place_certificate' => ['image', !$this->isEditOrUpdate() ? 'required' : ''],
            'third_place_certificate' => ['image', !$this->isEditOrUpdate() ? 'required' : ''],
            'default_certificate' => ['image', !$this->isEditOrUpdate() ? 'required' : ''],
            'duration' => ['required', 'numeric', 'min:0'],
            'limit' => ['required', 'numeric', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'role_id' => ['required', 'exists:roles,id'],
            'image' => [!$this->isEditOrUpdate() ? 'required' : '', 'image'],
            'id' => ['numeric', 'exists:quizzes,id', !$this->isStore() ? 'required' : '']
        ];
    }
}
