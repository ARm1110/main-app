<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::exists('users', 'email'),
            ],
        ], $this->validationMessages());

        $user=User::where('email','=',$request->email)->first();
        if (!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgetPassword($user));
            notify()->success('ایمیل خود را چک کنید','موفقیت آمیز');
            return redirect()->back();
        }else{
            notify()->error('انجام عملیات مقدور نمیباشد','خطا');
            return redirect()->back();
        }


    }
    public function getResetLinkEmail($token)
    {

        $user=User::where('remember_token','=',$token)->first()->remember_token;

        if (!empty($user)){
            notify()->success('رمز عبور را تغییر دهید','موفقیت آمیز');
            return view('auth.reset_password',compact('user'));
        }else{
           abort(404);
        }


    }
    public function postResetLinkEmail($token,Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ], $this->postResetLinkEmailvalidationMessages());

        $user=User::where('remember_token','=',$token)->first();
        $user->password = $request->password;
        $user->remember_token = null;
        $user->save();

        notify()->success('رمز عبور شما با موفقیت تغییر کرد.','موفقیت آمیز');
        return redirect(url('/login'));

    }
    protected function validationMessages()
    {
        return [
            'email.required' => 'آدرس ایمیل را وارد کنید!',
            'email.exists' => 'آدرس ایمیل وارد شده یافت نشد یا حساب کاربری شما حذف شده است.',
            'email.email' => 'فرمت ایمیل صحیح نیست'
        ];
    }

    protected function postResetLinkEmailvalidationMessages()
    {
        return [
            'password.required' =>'رمز عبور نباید خالی باشد',
            'password.min' =>'تعداد کراکتر رمز عبور کمتر از حد مجاز است',
            'password.confirmed'=>'رمز عبور یکسان نیست',
        ];
    }
}
