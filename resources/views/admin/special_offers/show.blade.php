@extends('admin.main')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 border rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-4">جزئیات تخفیف</h2>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">محصول</label>
                <p class="mt-1 text-gray-900">{{ $offer->product->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">درصد تخفیف</label>
                <p class="mt-1 text-gray-900">{{ $offer->discount }}%</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">تاریخ شروع</label>
                <p class="mt-1 text-gray-900">{{ $offer->start_date }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">تاریخ پایان</label>
                <p class="mt-1 text-gray-900">{{ $offer->end_date }}</p>
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('admin.special_offers.edit', $offer->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    ویرایش
                </a>
            </div>
        </div>
    </div>
@endsection
