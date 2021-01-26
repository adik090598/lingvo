<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 16:52
 */

namespace App\View\Components\Admin;

use App\View\BaseComponent;

class InputFormGroupList extends BaseComponent
{
    public $elements;
    public $errors;

    /**
     * InputFormGroupList constructor.
     * @param $elements
     */
    public function __construct($elements, $errors)
    {
        $this->elements = $elements;
        $this->errors = $errors;
    }


    public function render()
    {
        return $this->coreAdminView('forms.input-form-group-list');
    }

}
