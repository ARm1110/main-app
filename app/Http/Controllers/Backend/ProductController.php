<?php
//TODO: implemented but tested!
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CreateRequest;
use App\Http\Requests\product\updateRequest;
use App\Models\Product;
use App\Models\ChildCategory;
use App\Models\Offer;
use App\Models\Brand;
use App\Models\ProductImage;
use App\Models\ProductVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
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
                $product = Product::create($request->all());
                $this->handleFileUploads($request, $product);
                notify()->success('محصول با موفقیت ایجاد شد.', 'موفقیت آمیز');
                return redirect()->route('admin.product.index');
            });
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it, display an error message)
            notify()->error('در انجام عملیات خطایی رخ داد' .  $e->getMessage() , 'خطا');
            return redirect()->back()->withInput();
        }
    }

    public function removeVideo(Product $product, ProductVideo $video)
    {
        if ($product->videos->contains($video)) {
            File::delete($video->image_path);
            $video->delete();
            notify()->success('فیلم با موفقیت حذف شد', 'موفقیت آمیز');
            return redirect()->back();
        }
        notify()->error('فیلم یافت نشد یا با محصول مرتبط نیست.', 'خطا');

        return redirect()->back();
    }

    public function removeImage(Product $product, ProductImage $image)
    {

        if ($product->images->contains($image)) {
            File::delete($image->image_path);
            $image->delete();
            notify()->success('عکس با موفقیت حذف شد', 'موفقیت آمیز');

            return redirect()->back();
        }
        notify()->error('تصویر یافت نشد یا با محصول مرتبط نیست.', 'خطا');

        return redirect()->back();
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
    public function update(UpdateRequest $request, Product $product)
    {
        try {
            return DB::transaction(function () use ($request, $product) {
                $product->update($request->all());

                $this->handleFileUploads($request, $product);

                notify()->success('محصول با موفقیت بروزرسانی شد.', 'موفقیت آمیز');
                return redirect()->route('admin.product.index');
            });
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it, display an error message)
            notify()->error('در انجام عملیات خطایی رخ داد', 'خطا');
            return redirect()->back()->withInput();
        }
    }

    /**
     * حذف محصول مشخص
     */
    public function destroy($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $product = Product::findOrFail($id);

                // Delete associated videos
                $product->videos()->delete();

                // Delete associated images
                $product->images()->delete();

                // Delete the product
                $product->delete();

                notify()->success('محصول با موفقیت حذف شد.', 'موفقیت آمیز');
                return redirect()->route('admin.product.index');
            });
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it, display an error message)
            notify()->error('در انجام عملیات خطایی رخ داد', 'خطا');
            return redirect()->back();
        }
    }
    private function handleFileUploads($request, $product)
    {
        // Handle videos uploads
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $videoPath = $this->uploadFile($video, 'product_videos');
                $product->videos()->create(['video_path' => 'storage/' . $videoPath]);
            }
        }

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $this->uploadFile($image, 'product_images');
                $product->images()->create(['image_path' => 'storage/' . $imagePath]);
            }
        }
    }
}
