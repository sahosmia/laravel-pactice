<?php

namespace App\Models;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // ১. লগইন ফর্ম দেখানোর মেথড
    public function showLoginForm()
    {
        return view('auth.admin-login'); // আমরা এই ব্লেড ফাইলটি পরে তৈরি করবো
    }

    // ২. লগইন লজিক হ্যান্ডেল করার মেথড
    public function login(Request $request)
    {
        // $this->validate($request, [
        //     'email'   => 'required|email',
        //     'password' => 'required|min:6'
        // ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
