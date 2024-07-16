@extends('layouts.main2')

@section('content')
    <x-layouts.home.festival>
    </x-layouts.home.festival>

    <x-layouts.home.navbar :categories="$data['categories']">
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
                                                        <img src="{{asset($product->images->first()->image_path )}}" alt="" class="" width="150">
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
