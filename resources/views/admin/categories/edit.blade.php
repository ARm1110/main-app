@extends('admin.panel')
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

        <h2 class="text-2xl font-semibold mb-6">ویرایش دسته بندی</h2>


        <form action="{{ route('admin.category.update',['category'=>$category->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">نام دسته بندی</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب وضعیت</label>
                <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value='0' @if($category->status == 0 ) selected @endif >غیرفعال</option>
                    <option value='1' @if($category->status == 1 ) selected @endif>فعال</option>
                </select>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">آپدیت</button>
            </div>
        </form>
    </div>
</div>
@endsection
