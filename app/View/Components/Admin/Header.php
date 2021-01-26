<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 14:46
 */

namespace App\View\Components\Admin;

use App\View\BaseComponent;

class Header extends BaseComponent
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return $this->coreAdminView('parts.header');
    }

    public function navList()
    {
        return [
//            $this->navItem(route('profile.profile'), 'Профиль')
        ];
    }

    protected function navItem($url, $title)
    {
        return [
            'url' => $url,
            'title' => $title,
        ];
    }
}
