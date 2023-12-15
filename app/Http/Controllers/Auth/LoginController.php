<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request)
    {
        if (Auth::check()) {
            notify()->success('شما قبلا ورود کرده بودید','موفقیت آمیز');
            return redirect()->route('home');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();
            notify()->success('خوش امدید','موفقیت آمیز');
            return redirect()->route('home');
        }
        notify()->error('نام کاربری یا رمز عبور صحیح نیست','عملیات ناموفق');
        return redirect()->back();
    }
}
