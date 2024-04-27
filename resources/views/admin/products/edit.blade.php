@extends('admin.main')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 border rounded-md shadow-md">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" id="error-alert">
                        {{ $error }}
                    </div>
                @endforeach
                <script>
                    // Add a script to make the alert sticky and auto-close after 5 seconds
                    document.addEventListener('DOMContentLoaded', function () {
                        var errorAlert = document.getElementById('error-alert');

                        // Make the alert sticky
                        errorAlert.style.position = 'sticky';
                        errorAlert.style.top = '0';

                        // Auto-close the alert after 5 seconds
                        setTimeout(function () {
                            errorAlert.style.opacity = '0';
                            setTimeout(function () {
                                errorAlert.style.display = 'none';
                            }, 1000);
                        }, 5000);
                    });
                </script>
            @endif

        <div class="mt-6 flex">
            <h2 class="text-xl font-semibold mb-2">تصاویر</h2>
            @foreach($product->images as $image)
                <div class="flex flex-col">
                    <img src="{{ asset($image->image_path) }}" alt="Product Image"  class="w-32 h-32 mb-4">
                    <form action="{{ route('admin.products.removeImage', ['product' => $product, 'image' => $image]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                            حذف
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class="mt-6 flex">
            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-2">فیلم ها</h2>
                @foreach($product->videos as $video)
                    <div class="flex flex-col justify-items-center w-full ">
                        <video  controls>
                            <source src="{{ asset($video->video_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <form action="{{ route('admin.products.videoImage', ['product' => $product, 'video' => $video]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                حذف
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <form action="{{ route('admin.product.update',['product'=>$product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="images" class="block text-sm font-medium text-gray-600">تصاویر</label>
            <input type="file" name="images[]" id="images" class="mt-1 block w-full border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300" multiple>
        </div>

        <!-- Video Upload -->
        <div class="mb-4">
            <label for="videos" class="block text-sm font-medium text-gray-600">ویدیوها</label>
            <input type="file" name="videos[]" id="videos" class="mt-1 block w-full border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300" multiple>
        </div>
        <div class="mb-4">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب دسته بندی اصلی</label>
            <select id="countries" name="childcategory_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>بدون انتخاب</option>
            @foreach($childCategories as $childCategory)
                    <option value='{{$childCategory->id}}' @if($childCategory->id == $product->childcategory_id ) selected @endif >{{$childCategory->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب تخفیف کلی</label>
            <select id="countries" name="subcategory_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>بدون تخفیف کلی</option>
                @foreach($offers as $offer)
                    <option value='{{$offer->id}}' @if($offer->id == $product->offer_id ) selected @endif >{{$offer->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب برند</label>
            <select id="countries" name="subcategory_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>بدون برند</option>
                @foreach($brands as $brand)
                    <option value='{{$brand->id}}' @if($brand->id == $product->brand_id ) selected @endif >{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">نام محصول</label>
            <input type="text" value="{{$product->name  }}" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
        </div >

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">توضیحات</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
               {{$product->description  }}
            </textarea>
        </div>

        <div class="mb-4">
            <label for="price"  class="block text-sm font-medium text-gray-600">قیمت</label>
            <input type="number" value="{{$product->price  }}" name="price" id="price" class="mt-1 block w-full border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label for="offer_price" class="block text-sm font-medium text-gray-600">درصد تخفیف (اختیاری)</label>
            <input type="text" name="offer_price" id="offer_price" class="mt-1 block w-full border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
        </div>
        <div class="mb-4">
             <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب وضعیت</label>
             <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value='0' @if($childCategory->status == 0 ) selected @endif >غیرفعال</option>
                <option value='1' @if($childCategory->status == 1 ) selected @endif>فعال</option>
             </select>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">ذخیره محصول</button>
        </div>
        </form>
        </div>
    </div>
@endsection

