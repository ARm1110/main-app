<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'status'=>'required|boolean'
        ], $messages);

        Category::create($request->all());

        notify()->success('دسته بندی با موفقیت ایجاد شد.', 'موفقیت آمیز');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            'status'=>'required|boolean'
        ], $messages);

        $category = Category::findOrFail($id);
        $category->update($request->all());
        notify()->success('دسته بندی با موفقیت بروزرسانی شد.', 'موفقیت آمیز');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = Category::findOrFail($id);
        $subCategory->delete();
        notify()->success('دسته با موفقیت حذف شد.', 'موفقیت آمیز');
        return redirect()->route('admin.category.index');
    }
}
