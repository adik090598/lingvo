<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 11.07.2020
 * Time: 23:02
 */

namespace App\Http\Controllers\Web;


use App\Core\Traits\WebToastTrait;
use App\Http\Controllers\Controller;

class WebBaseController extends Controller
{
    use WebToastTrait;

    public function getCurrentUser()
    {
        return auth()->user();
    }

    public function getCurrentUserId()
    {
        return auth()->id();
    }

    public function adminView($viewPath, $compact = [])
    {
        return view("modules.admin.$viewPath", $compact);
    }

    public function adminPagesView($viewPath, $compact = [])
    {
        return view("modules.admin.pages.$viewPath", $compact);
    }

    public function frontPagesView($viewPath, $compact = [])
    {
        return view("modules.front.pages.$viewPath", $compact);
    }

    public function frontView($viewPath, $compact = [])
    {
        return view("modules.front.$viewPath", $compact);
    }
}
