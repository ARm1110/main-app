@extends('admin.panel')
@section('content')
    <script
        src="{{asset('storage/asset/js/jquery-3.7.1.js')}}">
    </script>

    <div class= "  overflow-x-auto shadow-md sm:rounded-lg w-full">
{{--        error--}}
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
{{--        error end--}}
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    شناسه
                </th>
                <th scope="col" class="px-6 py-3">
                    شماره تلفن کاربر
                </th>

                <th scope="col" class="px-6 py-3">
                    شناسه سفارش
                </th>
                <th scope="col" class="px-6 py-3">
                    محصولات سفارش شده
                </th>
                <th scope="col" class="px-6 py-3">
                   مبلغ پرداختی
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت سفارش
                </th>
                <th scope="col" class="px-6 py-3">
                    چاپ فاکتور
                </th>
                <th scope="col" class="px-6 py-3">
                    تغییر وضعیت به ارسال شده
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $order->id  }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $order->user->phone  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $order->payment_code  }}
                    </td>
                    <td class="px-6 py-4">
                        @foreach( $order->products as $product)
                           {{ $product->product->name }}  {{ $product->quantity }}x <br>
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        {{  number_format($order->total_amount)  }} تومان
                    </td>
                    <td class="px-6 py-4">
                        @if($order->status =='Unshipped')
                         ارسال نشده
                        @else
                            ارسال شده
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                      <a href="{{ route('admin.invoice.index' , ['id'=>$order->id ]) }}"  class=" btn bg-green-400 p-2 text-white  rounded hover:bg-gray-950 " >چاپ</a>
                    </td>
                    <td class="px-6 py-4 text-center">

                    <form action="{{ route('admin.order.update' , ['order_id'=>$order->id ]) }}" method="post">
                    @csrf
                    @method('patch')

                    @if($order->status =='Unshipped')
                    <input type="text" name="status" value="Shipped" hidden>
                    <button type="submit" class="btn bg-amber-500 p-2 text-white  rounded hover:bg-gray-950 " >ارسال</button>
                    @elseif($order->status =='Shipped')
                    <input type="text" name="status" value="Unshipped" hidden>
                    <button type="submit" class="btn bg-red-500 p-2 text-white  rounded hover:bg-gray-950 " >لغو ارسال</button>
                    @endif
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
