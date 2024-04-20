@extends('layouts.main2')

@section('content')
    <x-layouts.home.festival>
    </x-layouts.home.festival>

    <x-layouts.home.navbar :data="$data">
    </x-layouts.home.navbar>

    <div class="category">
        <div class="container-fluid">
            <div class="filter-items shadow-box">
                <div class="items">
                    <div class="link d-md-block d-none">
                        <a href="" class="active">پیشفرض</a>
                        <a href="" class="waves-effect waves-light">محبوب ترین</a>
                        <a href="" class="waves-effect waves-light">پرفروش ترین</a>
                        <a href="" class="waves-effect waves-light">جدیدترین</a>
                        <a href="" class="waves-effect waves-light">ارزان ترین</a>
                        <a href="" class="waves-effect waves-light">گران ترین</a>
                    </div>
                    <div class="count">
                        <p>مشاهده همه <span class="fw-bold">3</span> نتیجه</p>
                    </div>
                    <div class="link-responsive d-md-none d-block">
                        <form action="">
                            <select class="form-select bg-light">
                                <option>پیشفرض</option>
                                <option>محبوب ترین</option>
                                <option>پر فروش ترین</option>
                                <option>جدیدترین</option>
                                <option>ارزان ترین</option>
                                <option>گران ترین</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="category-filters">
                        <div class="category-filter">
                            <div class="category-filter-box">
                                <div class="category-filter-box-title">
                                    <h4 class="fw-bold">
                                        فیلتر موجودی و حراجی
                                    </h4>
                                </div>
                                <div class="category-filter-box-desc">
                                    <form action="">
                                        <div class="form-group form-check">
                                            <input class="form-check-input" type="radio" id="ProductOfferd" name="available">
                                            <label class="form-check-label" for="ProductOfferd">محصولات تخفیف
                                                خورده</label>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-check-input" type="radio" id="availableInStock" name="available">
                                            <label class="form-check-label" for="availableInStock">موجود در
                                                انبار</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="category-filter">
                            <div class="category-filter-box">
                                <div class="category-filter-box-title">
                                    <h4 class="fw-bold">
                                        دسته بندی نتایج
                                    </h4>
                                </div>
                                <div class="category-filter-box-desc">
                                    <ul class="category-filter-resoult">
                                        <li class="py-1"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left me-1" viewBox="0 0 16 16" stroke="black">
                                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                </svg>کالای دیجیتال</a>
                                            <ul>
                                                <li class="ps-2 py-1"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-left me-1" viewBox="0 0 16 16" stroke="black">
                                                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                        </svg>تلفن همراه</a>
                                                    <ul>
                                                        <li class="ps-3 py-1"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-left me-1" viewBox="0 0 16 16" stroke="black">
                                                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                                </svg>تلفن هوشمند</a>
                                                            <ul>
                                                                <li class="ps-3 py-1"><a href="">اپـل</a></li>
                                                                <li class="ps-3 py-1"><a href="" class="active">سامسونگ</a></li>
                                                                <li class="ps-3 py-1"><a href="">الجی</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="category-filter">
                            <div class="category-filter-box">
                                <div class="category-filter-box-title">
                                    <h4 class="fw-bold">
                                        فیلتر متنوع
                                    </h4>
                                </div>
                                <div class="category-filter-box-desc">
                                    <form action="">
                                        <div class="form-group form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">ریجیستر
                                                شده</label>
                                        </div>
                                        <div class="form-group form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">طرح اصلی
                                                بودن کالا</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="category-filter">
                            <div class="category-filter-box">
                                <div class="category-filter-box-title">
                                    <h4 class="fw-bold">
                                        فیلتر برند
                                    </h4>
                                </div>
                                <div class="category-filter-box-desc">
                                    <form action="">
                                        <div class="form-group">
                                            <select class="form-select select2-box select2-hidden-accessible" name="state" data-select2-id="select2-data-1-tuy5" tabindex="-1" aria-hidden="true">
                                                <option value="AL" data-select2-id="select2-data-3-f55o">سامسونگ</option>
                                                <option value="WY">الجی</option>
                                                <option value="WY">شیائومی</option>
                                                <option value="WY">اپل</option>
                                                <option value="WY">جی ال ایکس</option>
                                                <option value="WY">لنوو</option>
                                                <option value="WY">ایسوس</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="rtl" data-select2-id="select2-data-2-z919" style="width: 285.5px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-state-zx-container" aria-controls="select2-state-zx-container"><span class="select2-selection__rendered" id="select2-state-zx-container" role="textbox" aria-readonly="true" title="سامسونگ">سامسونگ</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="category-filter">
                            <div class="category-filter-box">
                                <div class="category-filter-box-title">
                                    <h4 class="fw-bold">
                                        محدوده قیمت
                                    </h4>
                                </div>
                                <div class="category-filter-box-desc">
                                    <form action="" method="get">
                                        <div class="form-group">
                                            <div class="slider slider-horizontal slider-rtl" id="slider5b"><div class="slider-track"><div class="slider-track-low" style="right: 0px; width: 0%;"></div><div class="slider-selection" style="right: 0%; width: 100%;"></div><div class="slider-track-high" style="left: 0px; width: 0%;"></div></div><div class="tooltip tooltip-main bs-tooltip-top" role="presentation" style="right: 50%;"><div class="arrow"></div><div class="tooltip-inner"> تومان 0 - 1000000 تومان </div></div><div class="tooltip tooltip-min bs-tooltip-top" role="presentation" style="right: 0%;"><div class="arrow"></div><div class="tooltip-inner">0</div></div><div class="tooltip tooltip-max bs-tooltip-bottom" role="presentation" style="right: 100%; top: 18px;"><div class="arrow"></div><div class="tooltip-inner">1000000</div></div><div class="slider-handle min-slider-handle round" role="slider" aria-valuemin="0" aria-valuemax="1000000" style="right: 0%;" aria-valuenow="0" tabindex="0"></div><div class="slider-handle max-slider-handle round" role="slider" aria-valuemin="0" aria-valuemax="1000000" style="right: 100%;" aria-valuenow="1000000" tabindex="0"></div></div><input type="range" id="catRange" name="range[]" style="display: none;" data-value="0,1000000" value="0,1000000">
                                            <div class="show-more-btn mt-2">
                                                <button class="shadow-box waves-effect waves-light" type="submit">اعمال فیلتر <i class="bi bi-filter"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="category-filter">
                            <div class="category-filter-box">
                                <div class="category-filter-box-title">
                                    <h4 class="fw-bold">
                                        فیلتر رنگ
                                    </h4>
                                </div>
                                <div class="category-filter-box-desc">
                                    <div class="color-box">
                                        <div class="color-box-item" data-toggle="tooltip" data-placement="top" aria-label="نام رنگ مورد نظر">
                                            <span class="color bg-danger"></span>
                                        </div>
                                        <div class="color-box-item active" data-toggle="tooltip" data-placement="top" aria-label="نام رنگ مورد نظر">
                                            <span class="color bg-primary"></span>
                                        </div>
                                        <div class="color-box-item" data-toggle="tooltip" data-placement="top" aria-label="نام رنگ مورد نظر">
                                            <span class="color bg-warning"></span>
                                        </div>
                                        <div class="color-box-item" data-toggle="tooltip" data-placement="top" aria-label="نام رنگ مورد نظر">
                                            <span class="color bg-success"></span>
                                        </div>
                                        <div class="color-box-item" data-toggle="tooltip" data-placement="top" aria-label="نام رنگ مورد نظر">
                                            <span class="color bg-secondary"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="category-item">
                        <div class="row">
                            @foreach($data['products'] as $product )
                                <div class="col-12">
                                    <div class="product-row shadow-box rounded-3 mb-3">
                                        <a href="product.html">
                                        </a><div class="product-row-desc justify-content-start"><a href="product.html">
                                            </a><div class="product-row-desc-item"><a href="product.html">
                                                    <div class="product-row-img">
                                                        <img src="{{asset('storage/asset/img/product/product-image1.jpg')}}" alt="" class="" width="150">
                                                    </div>
                                                </a><div class="product-row-title"><a href="product.html">
                                                        <h6 class="font-16">{{$product->name}} </h6>
                                                        <div class="product-price">

                                                            @if($product->offer_id != null )
                                                            <span class="badge rounded-pill bg-danger me-2">13%</span>
                                                            <p class="me-2 text-decoration-line-through fw-normal" style="color:#c3c1c1">7,500,000 تومان</p>
                                                            <p>7,500,000 تومان</p>
                                                            @endif
                                                                <p>
                                                                    {{ number_format($product->price) }} تومان
                                                                </p>
                                                        </div>
                                                    </a>
                                                    <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btnx btnx-default bg-green-400">افزودن به سبد
                                                            خرید</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <!-- FOR -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-layouts.home.footer>
    </x-layouts.home.footer>


@endsection
