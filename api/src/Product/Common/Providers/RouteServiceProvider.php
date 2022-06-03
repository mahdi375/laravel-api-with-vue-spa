<?php

namespace Modules\Product\Common\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        Route::middleware('web')
            ->namespace('Modules\Product\Backend\Controllers')
            ->group(module_path('Product', 'Backend/routes.php'));

        Route::prefix('api')
            ->middleware('api')
            ->namespace('Modules\Product\Frontend\Controllers')
            ->group(module_path('Product', 'Frontend/routes.php'));
    }
}