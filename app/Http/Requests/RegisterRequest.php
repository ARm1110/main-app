<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:5|max:10|unique:users,username|regex:/^(?=[a-zA-Z0-9._]{4,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',

        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'نام کاربری نباید خالی باشد',
            'email.required' =>'پست الکترونیک نباید خالی باشد',
            'password.required' =>'رمز عبور نباید خالی باشد',
            'username.max' => 'تعداد کراکتر بیشتر از حد مجاز است',
            'username.min' => 'تعداد کراکتر کمتر از حد مجاز است',
            'username.unique' => 'این نام کاربری ثبت شده است . نام کاربری دیگری انتخاب کنید',
            'username.regex' => '   فرمت نام کاربری صحیح نیست. شامل حروف فارسی و کارکتر خاص نباشد',
            'email.email'=>'فرمت پست الکترونیک صحیح نیست',
            'email.unique'=>'این پست الکترونیک ثبت شده است',
            'password.min' =>'تعداد کراکتر رمز عبور کمتر از حد مجاز است',
        ];
    }
}
