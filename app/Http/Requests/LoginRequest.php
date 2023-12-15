<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
            'remember' => 'in_array:null.true'
        ];
    }
    public function messages()
    {
        return [

            'email.required' =>'پست الکترونیک نباید خالی باشد',
            'email.exists' => 'پست لکترونیک ثبت نشده است',
            'password.required' =>'رمز عبور نباید خالی باشد',
            'password.min' =>'تعداد کراکتر رمز عبور کمتر از حد مجاز است',
            'remember.in_array'=> 'مقادیر {مرا فراموش نکن} صحیص نیست '
        ];
    }
}
