@extends('admin.panel')

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
        <h2 class="text-2xl font-bold mb-4">ایجاد دسته بندی</h2>

        <form action="{{ route('admin.childcategory.store') }}" method="post">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">نام دسته بندی:</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" value="{{ old('name') }}" required>
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="subcategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب زیر دسته </label>
                <select id="subcategory" name="subcategory_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($subcategories as $subcategory)
                        <option value='{{$subcategory->id}}' >{{$subcategory->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-gray-700">وضعیت:</label>
                <select name="status" id="status" class="mt-1 p-2 border rounded-md w-full" required>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>فعال</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>غیرفعال</option>
                </select>
                @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">ایجاد دسته بندی</button>
        </form>
    </div>
@endsection
