<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Product\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('frontend.pages.categories.index', compact('categories'));
    }

    public function show($slug)
    {

        $category = Category::with('products:id,category_id,name,price')->where('slug', $slug)
            ->firstOrFail();

        return view('frontend.pages.categories.show', compact('category'));
    }
}
