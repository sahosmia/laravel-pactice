<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\CategoryController;
use Modules\Product\Http\Controllers\ProductController;

// Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('products', ProductController::class)->names('product');
    Route::resource('categories', CategoryController::class)->names('category');
// });
