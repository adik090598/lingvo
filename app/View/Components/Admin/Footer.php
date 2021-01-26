<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 28.07.2020
 * Time: 16:29
 */

namespace App\View\Components\Admin;
use App\View\BaseComponent;

class Footer extends BaseComponent
{
    public function render()
    {
        return $this->coreAdminView('parts.footer');
    }

    public function navList()
    {
        return [
//            $this->navItem(route('welcome'), 'Website')
        ];
    }

    protected function navItem($url, $title)
    {
        return [
            'url' => $url,
            'title' => $title
        ];
    }

}
