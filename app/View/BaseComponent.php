<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 18:36
 */

namespace App\View;


use Illuminate\View\Component;

abstract class BaseComponent extends Component
{
    public function coreAdminView($path, $compact = [])
    {
        return view("modules.admin.core.components.$path", $compact);
    }

    public function coreFrontView($path, $compact = [])
    {
        return view("modules.front.core.components.$path", $compact);
    }
}