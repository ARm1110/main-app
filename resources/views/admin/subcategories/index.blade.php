@extends('admin.panel')
@section('content')
    <div class=" overflow-x-auto shadow-md sm:rounded-lg w-full">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">
            <a href="{{route('admin.subcategory.create')}}">افزودن جدید</a>
        </button>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    شناسه
                </th>
                <th scope="col" class="px-6 py-3">
                    نام زیر دسته
                </th>
                <th scope="col" class="px-6 py-3">
                    نام دسته بندی اصلی
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت
                </th>
                <th scope="col" class="px-6 py-3">
                    تغییرات
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($subCategories as $subcategory)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $subcategory->id  }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $subcategory->name  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $subcategory->category->name  }}
                    </td>
                    <td class="px-6 py-4">
                        @if($subcategory->status == 1)
                            <span class="bg-green-300 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded ">فعال</span>
                        @else
                            <span class="bg-red-200 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded  ">غیرفعال</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.subcategory.edit',['subcategory'=>$subcategory->id]) }}" class="font-medium text-blue-600 hover:underline">ویرایش</a>
                        <form action="{{route('admin.subcategory.destroy',['subcategory'=>$subcategory->id])}}" method="POST" class="inline" >
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
