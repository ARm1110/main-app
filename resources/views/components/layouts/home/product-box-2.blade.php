<div class="product-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="product-box-title">
                    <h2 class="slider-title">پیشنهادهای  تخفیف هفته</h2>
                    <a href="category.html">مشاهده همه <i class="bi bi-chevron-left"></i></a>
                </div>
                <div class="swiper product-box-items pt-md-0 pt-4 prodcut-box-one-slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-rtl swiper-backface-hidden">
                    <div class="swiper-wrapper" style="transform: translate3d(966.4px, 0px, 0px); transition-duration: 0ms;">
                        @foreach ($specialOffers as $offer)
                        <div class="swiper-slide" style="width: 221.6px; margin-left: 20px;">
                            <div class="product-box-item">
                                <div class="product-box-item-img">
                                    <a href="">
                                        @if ($offer->product->images->count() > 0)
                                            <img src="{{ asset( $offer->product->images->first()->image_path) }}" alt="{{ $offer->product->name }}" class="img-fluid one-image">
                                        @endif
                                        @if ($offer->product->images->count() > 1)
                                            <img src="{{ asset($offer->images->get(1)->image_path) }}" alt="{{ $offer->product->name }}" class="img-fluid two-image">
                                        @endif

                                    </a>
                                </div>
                                <a href="product.html">
                                    <div class="product-box-item-desc">
                                        <div class="product-box-item-title">
                                            <h6>
                                                {{$offer->product->name}}
                                            </h6>
                                        </div>
                                        <div class="product-box-price default">
                                            <span class="new-price">{{ $offer->discount }}% </span>
                                            <span class="new-price">{{ number_format($offer->product->price)  }} </span>
                                            <span class="new-price">{{ number_format($offer->discounted_price)  }} </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="swiper-slide" style="width: 221.6px; margin-left: 20px;">
                            <div class="product-box-item see-more-item">
                                <div class="see-all">
                                    <a href="#">
                                        <i class="bi bi-arrow-left-circle"></i>
                                        <p>مشاهده همه</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-button-disabled"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>
