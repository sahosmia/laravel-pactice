<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        return view('developer.index');
    }

    public function clearCache()
    {
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        // \Artisan::call('route:clear');
        // \Artisan::call('view:clear');

        return redirect()->back()->with('success', 'Application cache cleared successfully.');
    }
}
