<?php


namespace App\View\Components\Admin;


use App\View\BaseComponent;

class TextareaFormGroup extends BaseComponent
{
    public $name;
    public $placeholder;
    public $label;
    public $errors;
    public $required;
    public $value;

    public function __construct($name, $placeholder, $label, $errors = [], $required = true, $value = null)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->errors = $errors;
        $this->required = $required;
        $this->value = $value;
    }

    public function render()
    {
        return $this->coreAdminView('forms.textarea-form-group');
    }

}
