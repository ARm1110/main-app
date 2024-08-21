@extends('layouts.main2')

@section('content')
    <x-layouts.home.festival>
    </x-layouts.home.festival>

    <x-layouts.home.navbar :data="$data">
    </x-layouts.home.navbar>

    <div class="content">
        <div class="line-steps">
            <div class="container-fluid">
                <div class="line-step-container">
                    <div class="line-step">
                        <div class="line-step-boxs">
                            <div class="line-step-box complete">
                                <a href="#">
                                    <div class="icon">
                                        <i class="bi bi-bag"></i>
                                    </div>
                                    <p>سبد خرید</p>
                                </a>
                            </div>
                            <div class="line-step-box">
                                <a href="#">
                                    <div class="icon">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </div>
                                    <p>جزییات پرداخت</p>
                                </a>
                            </div>
                            <div class="line-step-box">
                                <a href="#">
                                    <div class="icon">
                                        <i class="bi bi-file-earmark-break"></i>
                                    </div>
                                    <p>تکمیل سفارش</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart">
            <div class="container-fluid">
                <div class="cart-content shadow-box">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart-detail">
                                <div class="table-responsive-lg">

                                    @if(empty($data['carts']) != true)
                                    <table class="table table-hover main-table">
                                        <thead style="background: #f8f8f8;">
                                        <tr class="py-3">
                                            <th scope="col">عملیات</th>

                                            <th scope="col">محصول</th>
                                            <th scope="col">قیمت</th>
                                            <th scope="col">تعداد</th>
                                            <th scope="col">قیمت کل</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($data['carts']->products as $cartProduct)

                                        <tr>
                                            <td>
                                                <form action="{{ route('cart.remove-product', $cartProduct) }}" class="flex" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" style="color: red" class=" w-1/2 hover:text-gray-600">خذف</button>
                                                </form>
                                            </td>
                                            <td class="title">{{ $cartProduct->product->name }} </td>
                                            <td class="price"><span class="num">{{ number_format($cartProduct->product->price) }}</span><span class="text-muted">تومان</span></td>
{{--                                           <td class="td-count"><div class="input-group bootstrap-touchspin bootstrap-touchspin-injected bg-blue-600"><input type="text" name="count" class="counter form-control" value="{{$cartProduct->quantity}}"></div></td>--}}
                                            <td class="td-count">
                                                <form action="{{ route('cart.update-quantity', $cartProduct) }}" class="flex flex-col" method="POST">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected bg-blue-600">
                                                        <input type="text" name="count" class="counter form-control" value="{{ $cartProduct->quantity }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-success bg-green-500 ">بروزرسانی</button>
                                                </form>
                                            </td>
                                            <td class="price"><span class="num">{{  number_format($cartProduct->product->price * $cartProduct->quantity) }}</span><span class="text-muted">تومان</span></td>

                                        </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row flex-wrap align-items-center">
                                    <div class="col-sm-8">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control w-100" placeholder="کد تخفیف">
                                            </div>
                                            <div class="col-sm-6 flex">
                                                <button type="submit" class="btn-main-primary btn-discount m-0 mt-sm-0 mt-2 btn-main waves-effect waves-light bg-amber-500 flex-row-reverse " style="white-space:nowrap ;">اعمال کد
                                                    تخفیف

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="cart-payment">
                                <div class="title text-center">
                                    <h4 class="fw-bold">مجموع کل سبد خرید</h4>
                                </div>
                                <table class="table main-table">
                                    <tbody><tr>
                                        <td class="fw-bold">قیمت کل</td>
                                        <td class="txt"><span class="fw-bold">{{  number_format($data['carts']->totalPrice()) }}</span> <span class="text-muted">تومان</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">حمل و نقل</td>
                                        <td class="txt"><span class="fw-bold">رایگان</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">مجموع</td>
                                        <td class="txt"><span class="fw-bold">{{ number_format($data['carts']->totalPrice()) }}</span> <span class="text-muted">تومان</span></td>
                                    </tr>

                                    </tbody></table>
                                <a href="{{route('checkout.index')}}" class="btn-bank waves-effect waves-light text-center">
                                    رفتن به مرحله بعد
                                </a>
                            </div>
                        </div>
                        @else
                            <tr>
                                <td>
                                    <p>سبد خالی میباشد!</p>
                                </td>
                            </tr>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>


    <x-layouts.home.footer>
    </x-layouts.home.footer>


@endsection
