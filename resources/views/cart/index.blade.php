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
                                <a href="cart.html">
                                    <div class="icon">
                                        <i class="bi bi-bag"></i>
                                    </div>
                                    <p>سبد خرید</p>
                                </a>
                            </div>
                            <div class="line-step-box">
                                <a href="checkout.html">
                                    <div class="icon">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </div>
                                    <p>جزییات پرداخت</p>
                                </a>
                            </div>
                            <div class="line-step-box">
                                <a href="cart.html">
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
                                    <table class="table table-hover main-table">
                                        <thead style="background: #f8f8f8;">
                                        <tr class="py-3">
                                            <th scope="col"></th>

                                            <th scope="col">محصول</th>
                                            <th scope="col">قیمت</th>
                                            <th scope="col">تعداد</th>
                                            <th scope="col">قیمت کل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['cart'] as $carts )
                                        <tr>
                                            <td class="icon text-center text-red-500"><a href="">حذف</a> </td>
                                            <td class="title">ساعت دیجیتال نیکون مدل coolpix p900</td>
                                            <td class="price"><span class="num">12,000,000</span><span class="text-muted">تومان</span></td>
                                            <td class="td-count"><div class="input-group bootstrap-touchspin bootstrap-touchspin-injected bg-blue-600"><input type="text" name="count" class="counter form-control" value="1"></div></td>
                                            <td class="price"><span class="num">12,000,000</span><span class="text-muted">تومان</span></td>
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
                                    <div class="col-sm-4">
                                        <div class="cart-footer-update text-sm-end text-center my-sm-0 my-3">
                                            <form action="">
                                                <button type="submit" class="btnx btnx-default waves-effect waves-light bg-green-500">بروز
                                                    رسانی سبد
                                                    خرید
                                                </button>
                                            </form>
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
                                        <td class="txt"><span class="fw-bold">42,000,000</span> <span class="text-muted">تومان</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">حمل و نقل</td>
                                        <td class="txt"><span class="fw-bold">2,000,000</span> <span class="text-muted">تومان</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">مجموع</td>
                                        <td class="txt"><span class="fw-bold">70,000,000</span> <span class="text-muted">تومان</span></td>
                                    </tr>

                                    </tbody></table>
                                <form action="">
                                    <button class="btn-bank waves-effect waves-light">اقدام به پرداخت

                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <x-layouts.home.footer>
    </x-layouts.home.footer>


@endsection
