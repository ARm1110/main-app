{{--<div class="home py-3">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12 mt-lg-0 mt-3 order-lg-2 order-1">--}}
{{--                <div class="swiper homeSlider sugget-Moment h-100">--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        <div class="swiper-slide rounded-circle">--}}
{{--                            <a href=""><img src="{{ asset('storage/asset/img/slider/slide1-2.jpg') }}" class="img-fluid" alt=""></a>--}}
{{--                        </div>--}}
{{--                        <div class="swiper-slide rounded-circle">--}}
{{--                            <a href=""><img src="{{ asset('storage/asset/img/slider/slide2-2.jpg') }}" class="img-fluid" alt=""></a>--}}
{{--                        </div>--}}
{{--                        <div class="swiper-slide rounded-circle">--}}
{{--                            <a href=""><img src="{{ asset('storage/asset/img/slider/slide3-1.jpg') }}" class="img-fluid" alt=""></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-button-next d-none d-lg-flex"></div>--}}
{{--                    <div class="swiper-button-prev d-none d-lg-flex"></div>--}}
{{--                    <div class="swiper-pagination"></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- end main slider -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('toggleButton');
        const closeButton = document.getElementById('closeButton');
        const toggleContent = document.getElementById('toggleContent');

        toggleButton.addEventListener('click', function () {
            toggleContent.classList.remove('hidden');
            toggleButton.classList.add('hidden');
            closeButton.classList.remove('hidden');
        });

        closeButton.addEventListener('click', function () {
            toggleContent.classList.add('hidden');
            toggleButton.classList.remove('hidden');
            closeButton.classList.add('hidden');
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 640) {
                toggleContent.classList.remove('hidden');
                toggleButton.classList.add('hidden');
                closeButton.classList.add('hidden');
            } else {
                toggleContent.classList.add('hidden');
                toggleButton.classList.remove('hidden');
                closeButton.classList.add('hidden');
            }
        });
    });
</script>

<div class="carousel w-full">
    <div id="slide1" class="carousel-item relative w-full">
        <img
            src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.webp"
            class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
            <a href="#slide4" class="btn btn-circle">❮</a>
            <a href="#slide2" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide2" class="carousel-item relative w-full">
        <img
            src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp"
            class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
            <a href="#slide1" class="btn btn-circle">❮</a>
            <a href="#slide3" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide3" class="carousel-item relative w-full">
        <img
            src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp"
            class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
            <a href="#slide2" class="btn btn-circle">❮</a>
            <a href="#slide4" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide4" class="carousel-item relative w-full">
        <img
            src="https://img.daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.webp"
            class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
            <a href="#slide3" class="btn btn-circle">❮</a>
            <a href="#slide1" class="btn btn-circle">❯</a>
        </div>
    </div>
</div>
<div class="flex w-full">
    <div class="card bg-base-300 rounded-box grid h-20 flex-grow place-items-center">content</div>
    <div class="divider divider-horizontal">OR</div>
    <div class="card bg-base-300 rounded-box grid h-20 flex-grow place-items-center">content</div>
</div>
<div class="bg-red-500 text-white rounded-lg p-4">
    <div class="flex justify-between items-center">
        <h2 class=" font-bold sm:text-sm">تخفیف ویژه</h2>
        <button id="toggleButton" class="btn btn-ghost text-white sm:hidden">نمایش</button>

        <button id="closeButton" class="btn btn-ghost text-white hidden sm:hidden">بستن</button>
    </div>
    <div id="toggleContent" class="toggle-content hidden">
        <p class="mt-2">این یک بخش تخفیف ویژه است که می‌تواند اطلاعات تخفیف‌ها و پیشنهادات ویژه را نمایش دهد.</p>
    </div>
</div>



