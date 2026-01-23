<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Product\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       view()->composer('frontend.*', function ($view) {
    $view->with([
        'categories' => cache()->remember(
            'categories',
            3600,
            fn () => Category::active()->whereNull('parent_id')->get()
        ),
        // 'brands' => cache()->remember(
        //     'brands',
        //     3600,
        //     fn () => Brand::active()->get()
        // ),
    ]);
});
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
