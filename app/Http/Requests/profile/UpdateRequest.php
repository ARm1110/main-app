<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'image' =>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6|confirmed',
            'current_password'=>'required|current_password'
        ];
    }
    public function messages()
    {
        return [
            'image.image'=>'فایل انتخابی مورد قبول نیست',
            'image.mimes'=>'این فرمت صحیص نیست',
            'image.max'=>'حجم عکس بیشتر از حد مجاز است ',
            'email.required' =>'پست الکترونیک نباید خالی باشد',
            'email.exists' => 'پست لکترونیک ثبت نشده است',
            'email.email' => 'پست الکترونیک فرمت مناسبی نیست',
            'password.required' =>'رمز عبور نباید خالی باشد',
            'password.min' =>'تعداد کراکتر رمز عبور کمتر از حد مجاز است',
            'password.confirmed'=>'رمز عبور یکسان نیست',
            'current_password.required' =>'رمز عبور نباید خالی باشد',
            'current_password.current_password' =>'رمز عبور صحیح نمی باشد',
        ];
    }
}
