<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Product\Common\Providers\ProductServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        // TODO: we should dynamically register module service providers ....
        $this->app->register(ProductServiceProvider::class);
    }

    public function boot()
    {
        //
    }
}
