<?php

namespace Modules\Product\Common\Providers;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{

    protected $moduleName = 'Product';
    protected $moduleNameLower = 'product';

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    public function boot()
    {
        $this->registerViews();
        $this->loadMigrations();
    }

    private function registerViews()
    {
        $this->loadViewsFrom(
            module_path($this->moduleName, 'Backend/Resources/views'),
            $this->moduleNameLower
        );
    }

    private function loadMigrations()
    {
        $this->loadMigrationsFrom(module_path($this->moduleName, '/Common/Database/Migrations'));
    }
}