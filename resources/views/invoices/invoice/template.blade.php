<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>فاکتور فروش</title>
</head>

<style>
    body {
        direction: rtl;
        padding: 1rem;
    }

    table {
        table-layout: fixed;
        width: 100%;
        border-collapse: collapse;
        border: 1px solid ;

    }
     th,
     th,
     td {

        border: 1px solid ;
         padding-bottom: 6px;
         margin-bottom: 4px;
         font-weight: normal;
         font-size: 15px;
    }

    @media (min-width: 640px) {
        padding-left: 1rem;
        padding-right: 1rem;
    }
</style>

<body dir="rtl">

<div style="margin-top: 100px;">
    <div style="display: grid;
                flex-wrap: wrap;

             ">
        <div style="

        text-align: center;
        ">
            <h3 style="
                font-weight: 700;
             ">صورتحساب فروش کالا و خدمات</h3>

        </div>


        <div style="

        text-align: left;
        ">
            <p style="direction: ltr">{{  $data['orders']->order_number }}  :<span>شماره سفارش </span> </p>
            <p style="direction: ltr">{{  verta($data['orders']->created_at)->format('Y/m/d H:i:s') }}  :<span>تاریخ سفارش </span> </p>
        </div>
    </div>
    <div style="
    display: flex;
    flex-wrap: wrap;
    ">
        <table style="
        margin-bottom: 1rem;
        width: 100%;
        max-width: 100%;
        background-color: transparent;

        ">
            <thead>
            <tr>
                <th style="
                text-align: center;
                " colspan="11">مشخصات فروشنده</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="11" style="
                text-align: right;
                ">
                    <div style="
                    display: flex;
                    flex-wrap: wrap;
                    ">
                        <div style="
                        width: 33.333333%;
                        ">
                            <p>نام شخص حقیق / حقوقی: فروشگاه لوازم آرایشی</p>
                            <p>آدرس کامل: استان تهران، شهر تهران، میدان ونک، خیابان حقانی، طبقه سوم</p>
                        </div>
                        <div style="
                        width: 33.333333%;
                        ">
                            <p>شماره اقتصادی:123213213</p>
                            <p>کد پستی:123213213</p>
                        </div>
                        <div style="
                        width: 33.333333%;
                        ">
                            <p>شماره ثبت / شناسه ملی:3213213213 </p>
                            <p>تلفن / نمابر:21321321321</p>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
            <thead>
            <tr>
                <th style="
                text-align: center;
                " colspan="11">مشخصات خریدار</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="11" style="
                text-align: right; ">
                    <div style="
                    display: flex;
                    flex-wrap: wrap;
                    ">
                        <div style="
                        width: 33.333333%;
                        ">
                            <p> <span>نام شخص حقیق / حقوقی:</span>{{$data['orders']->user->address->full_name }}</p>
                            <p> <span> آدرس کامل:</span> {{$data['orders']->user->address->full_address}} </p>
                        </div>
                        <div style="
                        width: 33.333333%;
                        ">
                            <p><span>کد پستی:</span> {{$data['orders']->user->address->postal_code}}</p>

                        </div>
                        <div style="
                        width: 33.333333%;
                        ">
                            <p> <span>شهر :</span>  {{$data['orders']->user->address->city->name}}</p>
                            <p><span>استان:</span> {{$data['orders']->user->address->province->name}}</p>
                        </div>
                        <div style="
                        width: 33.333333%;
                        ">
                            <p>  <span>تلفن همراه :</span>{{$data['orders']->user->phone}}</p>
                            <p><span>تلفن ثابت :</span>{{$data['orders']->user->address->tel}}</p>
                        </div>

                    </div>
                </td>
            </tr>
            </tbody>
            <thead>
            <tr>
                <th style="
                text-align: center;
                " colspan="11">مشخصات کالا یا خدمات مورد معامله</th>
            </tr>
            </thead>
            <thead>
            <tr style="
                text-align: center;
                " >
                <th colspan="3">ردیف</th>
                <th>کد کالا</th>
                <th>شرح کالا یا خدمات</th>
                <th>تعداد / مقدار</th>
                <th>واحد انداز گیری</th>
                <th>مبلغ واحد (ریال)</th>
                <th>مبلغ کل (ریال)</th>
                <th>مبلغ تخفیف (ریال)</th>
                <th>مبلغ کل پس از تخفیف (ریال)</th>

            </tr>
            </thead>
            <tbody>
            @php
                $i = 1;
            @endphp
            @foreach($data['orders']->products as $products)
                <tr style="
                text-align: center;
                " >
                    <td colspan="3">{{ $i }} </td>
                    <td>{{ $products->product->id  }}</td>
                    <td>{{ $products->product->name}}</td>
                    <td>{{ $products->quantity }}</td>
                    <td>عدد</td>
                    <td>{{ number_format($products->product->price * 10)}}</td>
                    <td>{{ number_format(($products->product->price * 10)*$products->quantity)}}</td>
                    <td>-</td>
                    <td>{{ number_format(($products->product->price * 10)*$products->quantity)}}</td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
            <tr>
                <th colspan="5" style="
                text-align: right;
                " >جمع کل</th>
                <th colspan="6" style="
                text-align: center;
                " >{{ number_format($data['orders']->total_amount * 10) }}</th>
            </tr>
            <tr>
                <th colspan="5" style="
                text-align: right;
                ">شرایط و نحوه فروش: پرداخت از سایت</th>
                <th colspan="6" style="
                text-align: right;
                "> <span>توضیحات :</span>  {{$data['orders']->user->address->description}} </th>
            </tr>
            <tr style="padding: 60px 0;">
                <td colspan="5" style="
                text-align: right;
                ">مهر و امضا فروشنده</td>
                <td colspan="6"style="
                text-align: right;
                ">مهر و امضا خریدار</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>
