@extends('admin.main')

@section('content')
    <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg">
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
        <h2 class="text-2xl font-bold mb-4">ایجاد محصول</h2>
        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Image Upload -->
            <div class="mb-4">
                <label for="images" class="block text-sm font-medium text-gray-600">تصاویر</label>
                <input type="file" name="images[]" id="images" class="mt-1 px-2 block w-full border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300" multiple>
            </div>
            <!-- Video Upload -->
            <div class="mb-4">
                <label for="videos" class="block text-sm font-medium text-gray-600">ویدیوها</label>
                <input type="file" name="videos[]" id="videos" class="mt-1 px-2 block w-full border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300" multiple>
            </div>

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">نام محصول</label>
                <input type="text" name="name"  id="name" class="mt-1 p-2 border rounded-md w-full" value="{{ old('name') }}" >
            </div>
            <div class="mb-4">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب وضعیت</label>
                <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value=''>بدون انتخاب</option>
                    <option value='0'>غیرفعال</option>
                    <option value='1'>فعال</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-700">قیمت محصول</label>
                <input type="text" name="price" id="price" class="mt-1 p-2 border rounded-md w-full" value="{{ old('price') }}" >
            </div>
            <div class="mb-6">
                <label for="offer_price" class="block text-sm font-medium text-gray-700">درصد تخفیف در صورت نیاز</label>
                <input type="text" name="offer_price" id="offer_price" class="mt-1 p-2 border rounded-md w-full" value="{{ old('offer_price') }}" >
            </div>
            <div class="mb-4">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب تخفیف جامع</label>
                <select id="countries" name="subcategory_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>بدون تخفیف جامع</option>
                    @foreach($offers as $offer)
                        <option value='{{$offer->id}}' >{{$offer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب برند</label>
                <select id="countries" name="subcategory_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>بدون برند</option>
                    @foreach($brands as $brand)
                        <option value='{{$brand->id}}' >{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب زیر دسته  </label>
                <select id="countries" name="childcategory_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>بدون انتخاب</option>
                    @foreach($childCategories as $childCategory)
                        <option value='{{$childCategory->id}}' >{{$childCategory->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">توضیحات</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    {{ old('description') }}
            </textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">ایجاد محصول</button>
        </form>
    </div>
@endsection
