<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:brands,name,' . $this->route('brand'),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'فیلد نام الزامی است.',
            'name.string' => 'نام باید یک رشته باشد.',
            'name.max' => 'نام نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
            'name.unique' => 'این نام برند قبلاً ثبت شده است.',
            'image.image' => 'فایل باید یک تصویر باشد.',
            'image.mimes' => 'فرمت تصویر باید یکی از این فرمت‌ها باشد: jpeg، png، jpg، gif، svg.',
            'image.max' => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',
        ];
    }
}
