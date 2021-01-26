<?php

namespace App\Http\Controllers;

use App\Core\Interfaces\WithUser;
use App\Core\Traits\RespTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController implements WithUser
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, RespTrait;
}
