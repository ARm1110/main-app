<div class="partner">
    <div class="container-fluid">
        <div class="partner-parrent">
            <div class="d-flex align-items-center justify-content-between pb-3">
                <div class="pbt-header-title">
                    <h6 class="slider-title">برخی همکاران ما</h6>
                </div>
                <div class="pbt-header-link">
                    <a href="" class="fromCenter border-animate text-black">مشاهده همه</a>
                </div>
            </div>
            <div class="swiper partnerSwipper">
                <div class="swiper-wrapper">
                    @foreach ($brands as $brand)
                    <div class="swiper-slide partner-item">
                        <a href="#">
                            <img src="{{ asset('storage/' . $brand->image) }}" class="img-fluid" alt="{{$brand->name}}">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next sb2" style="top: 36%;"></div>
                <div class="swiper-button-prev sb2" style="top: 36%;"></div>
            </div>
        </div>
    </div>
</div>
<!-- end partner -->
