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
        <h2 class="text-2xl font-bold mb-4">ایجاد تخفیف</h2>

        <form action="{{ route('admin.special_offers.store') }}" method="post">
            @csrf

            <div class="mb-6">
                <label for="discount" class="block text-sm font-medium text-gray-700">درصد تخفیف</label>
                <input type="number" name="discount" id="discount" class="mt-1 p-2 border rounded-md w-full" value="{{ old('name') }}" required>
                @error('discount')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="start_date" class="block text-sm font-medium text-gray-700">تاریخ شروع تخفیف</label>
                <input type="date" name="start_date" id="start_date" class="mt-1 p-2 border rounded-md w-full" value="{{ old('name') }}" required>
                @error('start_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="end_date" class="block text-sm font-medium text-gray-700">تاریخ پایان تخفیف</label>
                <input type="date" name="end_date" id="end_date" class="mt-1 p-2 border rounded-md w-full" value="{{ old('name') }}" required>
                @error('end_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">انتخاب محصول </label>
                <select id="product_id" name="product_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($products as $product)
                        <option value='{{$product->id}}' >{{$product->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">ایجاد تخفیف</button>
        </form>
    </div>
@endsection
