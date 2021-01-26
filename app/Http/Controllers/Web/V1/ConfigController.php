<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 20.06.2020
 * Time: 11:03
 */

namespace App\Http\Controllers\Web\V1;


use App\Http\Controllers\Web\WebBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConfigController extends WebBaseController
{
    public function configure(Request $request)
    {
        if ($request->get('token') == 'kasya') {
            return Artisan::call($request->get('command'));
        }
        return "fail";
    }
    public function migrateRefresh(Request $request)
    {
        if ($request->token == 'kasya') {
            return Artisan::call('migrate:refresh');
        } else {
            return 'fail';
        }
    }


    public function optimize(Request $request)
    {
        if ($request->token == 'kasya') {
            return Artisan::call('optimize');
        } else {
            return 'fail';
        }
    }

    public function clearAutoLoad(Request $request)
    {
        if ($request->token == 'kasya') {
            return Artisan::call('clear-compiled ') && Artisan::call('php artisan optimize');
        } else {
            return 'fail';
        }
    }

    public function migrate(Request $request)
    {
        if ($request->token == 'kasya') {
            return Artisan::call('migrate');
        } else {
            return 'fail';
        }
    }

    public function keyGenerate(Request $request)
    {
        if ($request->token == 'kasya') {
            return Artisan::call('key:generate');
        } else {
            return 'fail';
        }
    }

    public function configCache(Request $request)
    {
        if ($request->token == 'kasya') {
            return Artisan::call('config:cache');
        } else {
            return 'fail';
        }
    }

    public function cacheClear(Request $request)
    {
        if ($request->token == 'kasya') {
            return Artisan::call('cache:clear');
        } else {
            return 'fail';
        }
    }

    public function dbSeed(Request $request)
    {
        if ($request->token == 'kasya') {
            return Artisan::call('db:seed');
        } else {
            return 'fail';
        }
    }
}
