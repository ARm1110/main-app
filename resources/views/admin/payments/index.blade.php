@extends('admin.main')
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
                    شماره تلفن / شناسه
                </th>
                <th scope="col" class="px-6 py-3">
                    شماره merchant_id
                </th>

                <th scope="col" class="px-6 py-3">
                    شناسهref_id
                </th>
                <th scope="col" class="px-6 py-3">
                    مبلغ پرداختی
                </th>
                <th scope="col" class="px-6 py-3">
                    وضعیت سفارش
                </th>

                <th scope="col" class="px-6 py-3">
                    track_payment
                </th>
                <th scope="col" class="px-6 py-3">
                    زمان ایجاد
                </th>
                <th scope="col" class="px-6 py-3">
                    زمان بروزرسانی
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($payments as $payment)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $payment->id  }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $payment->user_id  }} / {{ $payment->user->phone  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $payment->merchant_id  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $payment->ref_id  }}
                    </td>
                    <td class="px-6 py-4">
                        {{   number_format ($payment->amount,0) }}
                    </td>
                    <td class="px-6 py-4">
                        {{   $payment->status  }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{   $payment->track_payment  }}
                    </td>
                    <td class="px-6 py-4 text-center">

                        {{   $payment->created_at }}
                    </td>
                    <td class="px-6 py-4 text-center">

                        {{   $payment->updated_at }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
