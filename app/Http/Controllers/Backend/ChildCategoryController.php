<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    /**
     * نمایش لیست زیردسته‌ها
     */
    public function index()
    {
        $childCategories = ChildCategory::all();
        return view('admin.childcategories.index', compact('childCategories'));
    }

    /**
     * نمایش فرم ایجاد زیردسته جدید
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        return view('admin.childcategories.create', compact('subcategories'));
    }

    /**
     * ذخیره زیردسته جدید
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'فیلد نام الزامی است.',
            'name.string' => 'نام باید یک رشته باشد.',
            'name.max' => 'نام نمی‌تواند بیشتر از :max کاراکتر باشد.',
            'status.required' => 'فیلد وضعیت الزامی است.',
            'status.boolean' => 'وضعیت باید یک مقدار منطقی (boolean) باشد.',
            'subcategory_id.required' => 'فیلد دسته بندی الزامی است.',
            'subcategory_id.exists' => 'دسته بندی انتخاب شده معتبر نیست.',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'subcategory_id' => 'required|exists:subcategories,id',
        ], $messages);

        Childcategory::create($request->all());

        notify()->success('زیردسته با موفقیت ایجاد شد.', 'موفقیت آمیز');
        return redirect()->route('admin.childcategory.index');
    }

    /**
     * نمایش زیردسته مشخص
     */
    public function show($id)
    {
        $childCategory = ChildCategory::findOrFail($id);

        return view('admin.childcategories.show', compact('childCategory'));
    }

    /**
     * نمایش فرم ویرایش زیردسته
     */
    public function edit($id)
    {
        $childCategory = ChildCategory::findOrFail($id);
        $subCategories = Subcategory::all();


        return view('admin.childcategories.edit', compact('childCategory', 'subCategories'));
    }

    /**
     * بروزرسانی زیردسته مشخص
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'فیلد نام الزامی است.',
            'name.string' => 'نام باید یک رشته باشد.',
            'name.max' => 'نام نمی‌تواند بیشتر از :max کاراکتر باشد.',
            'status.required' => 'فیلد وضعیت الزامی است.',
            'status.boolean' => 'وضعیت باید یک مقدار منطقی (boolean) باشد.',
            'subcategory_id.required' => 'فیلد دسته بندی الزامی است.',
            'subcategory_id.exists' => 'دسته بندی انتخاب شده معتبر نیست.',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'subcategory_id' => 'required|exists:subcategories,id',
        ], $messages);

        $childCategory = ChildCategory::findOrFail($id);
        $childCategory->update($request->all());

        notify()->success('زیردسته با موفقیت بروزرسانی شد.', 'موفقیت آمیز');
        return redirect()->route('admin.childcategory.index');
    }

    /**
     * حذف زیردسته مشخص
     */
    public function destroy($id)
    {
        $childCategory = ChildCategory::findOrFail($id);
        $childCategory->delete();

        notify()->success('زیردسته با موفقیت حذف شد.', 'موفقیت آمیز');
        return redirect()->route('admin.childcategory.index');
    }
}
