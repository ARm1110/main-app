<?php
//TODO: implemented but tested!
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CreateRequest;
use App\Models\Product;
use App\Models\ChildCategory;
use App\Models\Offer;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * نمایش لیست محصولات
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * نمایش فرم ایجاد محصول جدید
     */
    public function create()
    {
        $childCategories = ChildCategory::all();
        $offers = Offer::all();
        $brands = Brand::all();

        return view('admin.products.create', compact('childCategories', 'offers', 'brands'));
    }

    /**
     * ذخیره محصول جدید
     */
    public function store(CreateRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $product= Product::create($request->all());

                // Handle videos uploads
                if ($request->hasFile('videos')) {
                    foreach ($request->file('videos') as $video) {
                        $videoPath = $this->uploadFile($video, 'product_videos');
                        $product->videos()->create(['video_path' =>  'storage/'.$videoPath]);
                    }
                }

                // Handle image uploads
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $imagePath = $this->uploadFile($image, 'product_images');
                        $product->images()->create(['image_path' => 'storage/'.$imagePath]);
                    }
                }

                notify()->success('محصول با موفقیت ایجاد شد.', 'موفقیت آمیز');
                return redirect()->route('admin.product.index');
            });
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it, display an error message)
            dd($e->getMessage());
            notify()->error($e->getMessage(), 'خطا');
            return redirect()->back()->withInput();
        }
    }


    /**
     * Upload a file to the specified directory with a hashed filename.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @return string
     */
    private function uploadFile($file, $directory)
    {
        // Generate a unique filename based on the original name, timestamp, and random string
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $timestamp = now()->timestamp;
        $randomString = Str::random(10); // Adjust the length as needed
        $uniqueFilename = "{$filename}_{$timestamp}_{$randomString}.{$file->getClientOriginalExtension()}";

        // Save the file to the storage directory
        $filePath = $file->storeAs($directory, $uniqueFilename, 'public');

        return $filePath;
    }
    /**
     * نمایش محصول مشخص
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * نمایش فرم ویرایش محصول
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $childCategories = ChildCategory::all();
        $offers = Offer::all();
        $brands = Brand::all();

        return view('admin.products.edit', compact('product', 'childCategories', 'offers', 'brands'));
    }

    /**
     * بروزرسانی محصول مشخص
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'childcategory_id.required' => 'فیلد دسته بندی الزامی است.',
            'childcategory_id.exists' => 'دسته بندی انتخاب شده معتبر نیست.',
            'offer_id.exists' => 'پیشنهاد انتخاب شده معتبر نیست.',
            'brand_id.exists' => 'برند انتخاب شده معتبر نیست.',
            'name.required' => 'فیلد نام الزامی است.',
            'description.required' => 'فیلد توضیحات الزامی است.',
            'price.required' => 'فیلد قیمت الزامی است.',
            'price.integer' => 'فیلد قیمت باید یک عدد صحیح باشد.',
        ];

        $request->validate([
            'childcategory_id' => 'required|exists:childcategories,id',
            'offer_id' => 'nullable|exists:offers,id',
            'brand_id' => 'nullable|exists:brands,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'offer_price' => 'nullable|numeric',
        ], $messages);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        notify()->success('محصول با موفقیت بروزرسانی شد.', 'موفقیت آمیز');
        return redirect()->route('admin.product.index');
    }

    /**
     * حذف محصول مشخص
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        notify()->success('محصول با موفقیت حذف شد.', 'موفقیت آمیز');
        return redirect()->route('admin.product.index');
    }
}
