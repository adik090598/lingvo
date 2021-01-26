<?php


namespace App\View\Components\Admin;


use App\View\BaseComponent;

class CheckboxFormGroup extends BaseComponent
{
    public $name;
    public $type;
    public $label;
    public $errors;
    public $required;
    public $options;

    public function __construct($name, $type, $label, $errors = [], $required = true, $options = [])
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->errors = $errors;
        $this->required = $required;
        $this->options = $options;
    }

    public function render()
    {
        return $this->coreAdminView('forms.checkbox-form-group');
    }
}
