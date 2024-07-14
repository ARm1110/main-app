@extends('layouts.main2')

@section('content')
    <x-layouts.home.festival>
    </x-layouts.home.festival>

    <x-layouts.home.navbar :categories="$data['categories']">
    </x-layouts.home.navbar>

    <x-layouts.home.main-slider>
    </x-layouts.home.main-slider>

    <x-layouts.home.end-banner>
    </x-layouts.home.end-banner>


    <x-layouts.home.offers>
    </x-layouts.home.offers>

    <x-layouts.home.main-category>
    </x-layouts.home.main-category>

    <x-layouts.home.product-box-2 :specialOffers="$data['specialOffers']">
    </x-layouts.home.product-box-2>

    <x-layouts.home.brand>
    </x-layouts.home.brand>

    <x-layouts.home.footer>
    </x-layouts.home.footer>


    <div class="modal fade modal-lg product-modal" id="productModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <a href="">
                            <div class="d-flex">
                                <i class="bi bi-bag-plus me-1"></i>
                                <h4>گوشی موبابل شیائومی مدل 12x2002548 دو سیم کارت ظرفیت 256 گیگابایت و رم 8 گیگابایت
                                </h4>
                            </div>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 mb-md-0 mb-2">
                            <div class="swiper product-modal">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="img/product/laptop(1).png" alt="" class="img-fluid">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="img/product/watch.png" alt="" class="img-fluid">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="img/product/mobile.png" alt="" class="img-fluid">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="img/product/shirt1.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-button-next sb"></div>
                                <div class="swiper-button-prev sb"></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-modal-detail">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="product-meta-item text-muted">
                                            <i class="bi bi-tag"></i>
                                            مدل:
                                            <a href="">شیائومی</a>
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="product-meta-item text-muted">
                                            <i class="bi bi-tag"></i>
                                            دسته بندی:
                                            <a href="">کالای دیجیتال</a>,
                                            <a href="">تلفن همراه</a>,
                                            <a href="">شیائومی</a>,
                                            <a href="">ارزان کالا</a>,
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="product-meta-item text-muted">
                                            <i class="bi bi-shield-check"></i>
                                            گارانتی:
                                            <span>گارانتی 18 ماهه گرین</span>
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="product-meta-item text-muted">
                                            <i class="bi bi-tag"></i>
                                            برچسب:
                                            <a href="">کالای دیجیتال</a>,
                                            <a href="">تلفن همراه</a>,
                                            <a href="">شیائومی</a>,
                                            <a href="">ارزان کالا</a>,
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-modal-feature">
                                <strong>ویژگی های محصول:</strong>
                                <ul>
                                    <li>
                                        <span class="title">سری پردازنده:</span>
                                        <span class="desc">Core i7</span>
                                    </li>
                                    <li>
                                        <span class="title">مقدار رم:</span>
                                        <span class="desc">16 گیگابایت</span>
                                    </li>
                                    <li>
                                        <span class="title">حافظه داخلی:</span>
                                        <span class="desc">512 گیگابایت</span>
                                    </li>
                                    <li>
                                        <span class="title">شبکه های ارتباطی:</span>
                                        <span class="desc">بدون سیم کارت</span>
                                    </li>
                                    <li>
                                        <span class="title">رابط ها:</span>
                                        <span class="desc">جک 3.5 میلیمتری صدا</span>
                                    </li>
                                    <li class="read-more-target">
                                        <span class="title">محدوده عملکرد:</span>
                                        <span class="desc">10 متر</span>
                                    </li>
                                    <li class="read-more-target">
                                        <span class="title">عمر باتری:</span>
                                        <span class="desc">4.5 ساعت</span>
                                    </li>
                                    <li class="read-more-target">
                                        <span class="title">نوع گوشی:</span>
                                        <span class="desc">2 گوشی</span>
                                    </li>
                                </ul>
                                <label for="post-2" class="read-more-trigger"></label>
                            </div>
                            <div class="product-modal-price">
                                <span class="old">1,800,000 تومان</span>
                                <span class="new">730,000 تومان</span>
                            </div>
                            <div class="product-modal-link">
                                <form action="">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <div class="cart-counter">
                                                <input type="text" name="count" class="counter"
                                                       value="1">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <button
                                                class="shadow-sm fw-bold btn-add-to-cart mt-sm-0 mt-2 waves-effect waves-light">افزودن
                                                به سبد
                                                خرید</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
