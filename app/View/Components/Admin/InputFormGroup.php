<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 16:04
 */

namespace App\View\Components\Admin;

use App\View\BaseComponent;

class InputFormGroup extends BaseComponent
{
    public $name;
    public $type;
    public $placeholder;
    public $label;
    public $errors;
    public $required;
    public $value;
    public $multiple;
    public $max;
    public $hidden;
    public $image;

    public function __construct($name, $type, $placeholder, $label, $errors = [], $required = true, $value = null,
                                $multiple = false,$max = null, $hidden = false, $image = true)
    {
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->errors = $errors;
        $this->required = $required;
        $this->value = $value;
        $this->multiple = $multiple;
        $this->max = $max;
        $this->hidden = $hidden;
        $this->image = $image;
    }

    public function render()
    {
        return $this->coreAdminView('forms.input-form-group');
    }

}
