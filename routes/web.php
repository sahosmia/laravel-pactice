<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserLoginController;

// আপনার অন্যান্য কন্ট্রোলারগুলো এখানে ইমপোর্ট করুন

/*
|--------------------------------------------------------------------------
| Web Routes (Customer/Default Guard)
|--------------------------------------------------------------------------
*/

// সাধারণ ভিজিটরদের জন্য (লগইন ছাড়া)
Route::get('/', function () {
    return view('welcome');
});

// কাস্টমার লগইন করা থাকলে (auth:web)
Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// কাস্টমার লগইন সিস্টেম (Breeze বা Jetstream থাকলে এগুলো অটো জেনারেট হয়)
// এখানে ডিফল্ট auth রাউটগুলো থাকবে।

/*
|--------------------------------------------------------------------------
| Customer (Web Guard) Routes
|--------------------------------------------------------------------------
*/
// কাস্টমার লগইন পেজ
Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class, 'login']);

// কাস্টমার ড্যাশবোর্ড (সুরক্ষিত)
Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard', function () {
        return "Welcome to User Dashboard";
    })->name('user.dashboard');
    Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| Admin Routes (Custom Admin Guard)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // যারা লগইন করা নেই (Guest Admin)
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    });

    // যারা লগইন করা আছেন (Auth Admin)
    Route::middleware(['auth:admin'])->group(function () {

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

        // অ্যাডমিনের অন্যান্য রাউট এখানে যোগ করুন...
    });
});
