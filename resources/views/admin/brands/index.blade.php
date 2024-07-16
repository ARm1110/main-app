@extends('admin.main')
@section('content')
    <div class="overflow-x-auto shadow-md sm:rounded-lg w-full">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
            <a href="{{ route('admin.brands.create') }}">افزودن جدید</a>
        </button>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    شناسه
                </th>
                <th scope="col" class="px-6 py-3">
                    نام برند
                </th>
                <th scope="col" class="px-6 py-3">
                    تصویر برند
                </th>
                <th scope="col" class="px-6 py-3">
                    تغییرات
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $brand->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $brand->name }}
                    </td>
                    <td class="px-6 py-4">
                        @if($brand->image)
                            <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="w-20 h-20 object-cover">
                        @else
                            <span>بدون تصویر</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.brands.edit', ['brand' => $brand->id]) }}" class="font-medium text-blue-600 hover:underline">ویرایش</a>
                        <a href="{{ route('admin.brands.show', ['brand' => $brand->id]) }}" class="font-medium text-blue-600 hover:underline">نمایش</a>

                        <form action="{{ route('admin.brands.destroy', ['brand' => $brand->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-blue-600 hover:underline">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
