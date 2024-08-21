<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = Subcategory::all();
        return view('admin.subcategories.index', compact('subCategories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // You may need to pass category data if subcategories are associated with categories
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'فیلد نام الزامی است.',
            'name.string' => 'نام باید یک رشته باشد.',
            'name.max' => 'نام نمی‌تواند بیشتر از :max کاراکتر باشد.',
            'status.required' => 'فیلد وضعیت الزامی است.',
            'status.boolean' => 'وضعیت باید یک مقدار منطقی (boolean) باشد.',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ], $messages);

        SubCategory::create($request->all());

        notify()->success('زیردسته با موفقیت ایجاد شد.', 'موفقیت آمیز');
        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return view('admin.subcategories.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();

        return view('admin.subcategories.edit', compact('subCategory', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $messages = [
            'name.required' => 'فیلد نام الزامی است.',
            'name.string' => 'نام باید یک رشته باشد.',
            'name.max' => 'نام نمی‌تواند بیشتر از :max کاراکتر باشد.',
            'status.required' => 'فیلد وضعیت الزامی است.',
            'status.boolean' => 'وضعیت باید یک مقدار منطقی (boolean) باشد.',
            'category_id.required' => 'فیلد دسته بندی الزامی است.',
            'category_id.exists'=>'فیلد نام دسته بندی باید مرتبط باشد.',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'category_id'=>'required|exists:categories,id'
        ], $messages);

        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update($request->all());

        notify()->success('زیردسته با موفقیت بروزرسانی شد.', 'موفقیت آمیز');
        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        notify()->success('زیردسته با موفقیت حذف شد.', 'موفقیت آمیز');
        return redirect()->route('admin.subcategory.index');
    }
}
