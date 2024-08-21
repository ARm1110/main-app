@extends('admin.main')
@section('content')
    <div class=" overflow-x-auto shadow-md sm:rounded-lg w-full">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">
            <a href="{{route('admin.special_offers.create')}}">افزودن جدید</a>
        </button>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    شناسه
                </th>
                <th scope="col" class="px-6 py-3">
                    نام محصول
                </th>
                <th scope="col" class="px-6 py-3">
                    تخفیف
                </th>
                <th scope="col" class="px-6 py-3">
                    تاریخ آغاز
                </th>
                <th scope="col" class="px-6 py-3">
                    تاریخ پایان
                </th>
                <th scope="col" class="px-6 py-3">
                    عملیات
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($offers as $offer)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $offer->id  }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $offer->product->name  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->discount }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->start_date  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->end_date  }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.special_offers.edit', ['special_offer' => $offer->id]) }}" class="font-medium text-blue-600 hover:underline">ویرایش</a>
                        <a href="{{ route('admin.special_offers.show', ['special_offer' => $offer->id]) }}" class="font-medium text-blue-600 hover:underline">نمایش</a>

                        <form action="{{ route('admin.special_offers.destroy', ['special_offer' => $offer->id]) }}" method="POST" class="inline">
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
