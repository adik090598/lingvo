<?php

namespace App\Providers;


use App\Services\Common\V1\Support\FileService;
use App\Services\Common\V1\Support\impl\FileServiceImpl;
use Illuminate\Support\ServiceProvider;

class SystemServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {

        $this->app->bind(FileService::class, function ($app) {
            return new FileServiceImpl();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
