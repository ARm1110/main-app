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
                    document.addEventListener('DOMContentLoaded', function () {
                        var errorAlert = document.getElementById('error-alert');
                        errorAlert.style.position = 'sticky';
                        errorAlert.style.top = '0';
                        setTimeout(function () {
                            errorAlert.style.opacity = '0';
                            setTimeout(function () {
                                errorAlert.style.display = 'none';
                            }, 1000);
                        }, 5000);
                    });
                </script>
            @endif

            <h2 class="text-2xl font-bold mb-4">ویرایش تخفیف</h2>

            <form action="{{ route('admin.special_offers.update', ['special_offer' => $offer->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="product_id" class="block text-sm font-medium text-gray-700">محصول</label>
                    <select name="product_id" id="product_id" class="mt-1 block w-full border-gray-300 rounded-md">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $offer->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="discount" class="block text-sm font-medium text-gray-700">درصد تخفیف</label>
                    <input type="text" name="discount" id="discount" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ old('discount', $offer->discount) }}">
                </div>

                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">تاریخ شروع</label>
                    <input type="date" name="start_date" id="start_date" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ old('start_date', $offer->start_date) }}">
                </div>

                <div class="mb-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">تاریخ پایان</label>
                    <input type="date" name="end_date" id="end_date" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ old('end_date', $offer->end_date) }}">
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">ذخیره تغییرات</button>
                </div>
            </form>
        </div>
    </div>
@endsection
