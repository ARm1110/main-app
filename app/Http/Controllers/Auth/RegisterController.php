<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {

            User::create(
                [
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => $request->password,
                ]
            );
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('single')->error('Error during user registration: ' .  $e->getMessage());
            notify()->error('خطایی در سیستم رخ داده است','خطا در عملیات');
            return redirect()->back();
        }

        notify()->success('ثبت نام به موفقیت آمیز انجام شد','موفقیت آمیز');
        return redirect()->route('login');
    }
}
