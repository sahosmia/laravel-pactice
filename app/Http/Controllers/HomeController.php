<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Product\Models\Category;
use Modules\Product\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // categories,
        // featured products, latest products, banners data can be passed here
        $categories = Category::active()->whereNull('parent_id')->get();
        $featuredProducts = Product::where('is_featured', true)->take(10)->get();
        $latestProducts = Product::latest()->take(10)->get();
        $banners = [];

        return view('frontend.pages.home', compact('categories', 'featuredProducts', 'latestProducts', 'banners'));
    }
}
