<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Frontend\Controllers\ProductController;

Route::prefix('products')->group(function() {
    Route::get('/', [ProductController::class, 'index']);
});