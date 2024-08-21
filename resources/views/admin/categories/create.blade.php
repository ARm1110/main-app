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
        <h2 class="text-2xl font-bold mb-4">ایجاد دسته بندی</h2>

        <form action="{{ route('admin.category.store') }}" method="post">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">نام دسته بندی:</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" value="{{ old('name') }}" required>
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
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
