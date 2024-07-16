<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\CreateRequest;
use App\Http\Requests\Brand\UpdateRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * نمایش لیست برندها
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * نمایش فرم ایجاد برند جدید
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * ذخیره برند جدید
     */
    public function store(CreateRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $brand = new Brand($request->only('name'));

                if ($request->hasFile('image')) {
                    $imagePath = $this->uploadFile($request->file('image'), 'brand_images');
                    $brand->image = $imagePath;
                }

                $brand->save();

                notify()->success('برند با موفقیت ایجاد شد.', 'موفقیت آمیز');
                return redirect()->route('admin.brands.index');
            });
        } catch (\Exception $e) {
            notify()->error('در انجام عملیات خطایی رخ داد: ' . $e->getMessage(), 'خطا');
            return redirect()->back()->withInput();
        }
    }

    /**
     * نمایش برند مشخص
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * نمایش فرم ویرایش برند
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * بروزرسانی برند مشخص
     */
    public function update(UpdateRequest $request, Brand $brand)
    {
        try {
            return DB::transaction(function () use ($request, $brand) {
                $brand->fill($request->only('name'));

                if ($request->hasFile('image')) {
                    // حذف تصویر قبلی
                    if ($brand->image && Storage::disk('public')->exists($brand->image)) {
                        Storage::disk('public')->delete($brand->image);
                    }

                    // آپلود تصویر جدید
                    $imagePath = $this->uploadFile($request->file('image'), 'brand_images');
                    $brand->image = $imagePath;
                }

                $brand->save();

                notify()->success('برند با موفقیت بروزرسانی شد.', 'موفقیت آمیز');
                return redirect()->route('admin.brands.index');
            });
        } catch (\Exception $e) {
            notify()->error('در انجام عملیات خطایی رخ داد: ' . $e->getMessage(), 'خطا');
            return redirect()->back()->withInput();
        }
    }


    public function destroy($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $brand = Brand::findOrFail($id);

                // به‌روزرسانی محصولات مرتبط
                Product::where('brand_id', $id)->update(['brand_id' => null]);

                // حذف تصویر برند
                if ($brand->image && Storage::disk('public')->exists($brand->image)) {
                    Storage::disk('public')->delete($brand->image);
                }

                // حذف برند
                $brand->delete();

                notify()->success('برند با موفقیت حذف شد.', 'موفقیت آمیز');
                return redirect()->route('admin.brands.index');
            });
        } catch (\Exception $e) {
            notify()->error('در انجام عملیات خطایی رخ داد: ' . $e->getMessage(), 'خطا');
            return redirect()->back();
        }
    }


    /**
     * آپلود فایل با نام یکتا به دایرکتوری مشخص شده
     */
    private function uploadFile($file, $directory)
    {
        // ایجاد نام فایل یکتا بر اساس نام اصلی، timestamp و رشته تصادفی
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $timestamp = now()->timestamp;
        $randomString = Str::random(10); // Adjust the length as needed
        $uniqueFilename = "{$filename}_{$timestamp}_{$randomString}.{$file->getClientOriginalExtension()}";

        // ذخیره فایل به دایرکتوری storage
        $filePath = $file->storeAs($directory, $uniqueFilename, 'public');

        return $filePath;
    }
}
