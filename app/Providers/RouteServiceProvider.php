<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    protected function getApiNamespace($version = null)
    {
        $namespace = $this->namespace . '\Api';
        return $this->configureNamespaceForVersion($namespace, $version);
    }

    protected function getWebNamespace($version = null)
    {
        $namespace = $this->namespace . '\Web';
        return $this->configureNamespaceForVersion($namespace, $version);
    }

    private function configureNamespaceForVersion($namespace, $version = null)
    {
        if ($version) {
            $namespace = $namespace . "\V$version";
        }
        return $namespace;
    }

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/admin/home';
    public const WELCOME = '';
    public const PROFILE = '/profile';
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiVersionedRoutes(1);
        $this->mapApiVersionedRoutes(2);
        $this->mapWebVersionedRoutes(1);
        $this->mapWebVersionedRoutes(2);
    }

    protected function mapWebVersionedRoutes($version)
    {
        Route::middleware('web')
            ->namespace($this->getWebNamespace($version))
            ->group(base_path("routes/web/V$version/web.php"));
    }

    protected function mapApiVersionedRoutes($version)
    {
        Route::prefix("api/V$version")
            ->middleware(['api', 'localization'])
            ->namespace($this->getApiNamespace($version))
            ->group(base_path("routes/api/V$version/api.php"));
    }
}
