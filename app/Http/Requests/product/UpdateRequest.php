<?php

namespace App\Http\Requests\product;

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
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'videos.*' => 'mimetypes:video/mp4,video/quicktime,video/webm|max:20480',
            'name' => 'required|string',
            'price' => 'required|integer',
            'offer_price' => 'nullable|numeric',
            'offer_id' => 'nullable|exists:offers,id',
            'childcategory_id' => 'required|exists:childcategories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'description' => 'required|string',
            'status' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'childcategory_id.required' => 'فیلد دسته بندی الزامی است.',
            'childcategory_id.exists' => 'دسته بندی انتخاب شده معتبر نیست.',
            'offer_id.exists' => 'پیشنهاد انتخاب شده معتبر نیست.',
            'brand_id.exists' => 'برند انتخاب شده معتبر نیست.',
            'name.required' => 'فیلد نام الزامی است.',
            'description.required' => 'فیلد توضیحات الزامی است.',
            'price.required' => 'فیلد قیمت الزامی است.',
            'price.integer' => 'فیلد قیمت باید یک عدد صحیح باشد.',
            'images.*.image' => 'فایل باید یک تصویر باشد.',
            'images.*.mimes' => 'فرمت تصویر باید یکی از این فرمت‌ها باشد: jpeg، png، jpg.',
            'images.*.max' => 'حجم تصویر نباید بیشتر از 2 مگابایت باشد.',
            'videos.*.mimetypes' => 'فرمت ویدئو باید یکی از این فرمت‌ها باشد: mp4، quicktime، webm.',
            'videos.*.max' => 'حجم ویدئو نباید بیشتر از 20 مگابایت باشد.',
            'status.required' => 'فیلد وضعیت الزامی است.',
            'status.boolean' => 'وضعیت باید یک مقدار منطقی (boolean) باشد.',
        ];
    }
}
