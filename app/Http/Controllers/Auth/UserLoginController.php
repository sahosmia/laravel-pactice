<?php

namespace App\Models;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    // ১. লগইন ফর্ম দেখানোর মেথড
    public function showLoginForm()
    {
        return view('auth.user-login'); // আমরা এই ব্লেড ফাইলটি পরে তৈরি করবো
    }

    // ২. লগইন লজিক হ্যান্ডেল করার মেথড
    public function login(Request $request)
    {
        // ইনপুট ভ্যালিডেশন
        // $this->validate($request, [
        //     'email'   => 'required|email',
        //     'password' => 'required|min:6'
        // ]);

        // অ্যাডমিন গার্ড দিয়ে লগইন চেষ্টা করা
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            // সফল হলে ড্যাশবোর্ডে পাঠানো
            return redirect()->intended(route('user.dashboard'));
        }

        // ব্যর্থ হলে আবার লগইন পেজে ফেরত পাঠানো
        return back()->withInput($request->only('email', 'remember'));
    }
}
