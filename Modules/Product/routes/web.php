<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\CategoryController;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Controllers\BrandController;
use Modules\Product\Http\Controllers\TagController;
use Modules\Product\Http\Controllers\ReviewController;

Route::group([], function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('tags', TagController::class);
    Route::resource('reviews', ReviewController::class)->except(['create', 'store']);
});
