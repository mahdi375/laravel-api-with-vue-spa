<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Backend\Controllers\ProductController;

Route::prefix('admin/products')->group(function() {
    Route::get('/', [ProductController::class, 'index']);
});
