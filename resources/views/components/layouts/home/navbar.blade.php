<header>
    <div class="container-fluid">
        <div class="row">
            <div class="header-contact d-lg-block d-none col-12">
                <div class="row align-items-center justify-content-between">
                    <div class="col-6">
                        <ul class="nav header-contact-right">
                            <li class="nav-item"><a href="" class="nav-link font-14">راهنمای خرید</a></li>
                            <li class="nav-item"><a href="" class="nav-link font-14">ارتباط با ما</a></li>
                            <li class="nav-item"><a href="" class="nav-link font-14">سوالات متداول</a></li>
                            <li class="nav-item"><a href="" class="nav-link font-14">درباره ما</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="nav header-contact-left">
                            <li class="nav-item"><a href="" class="nav-link font-14">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg>
                                    09332002020
                                </a></li>
                            <li class="nav-item"><a href="" class="nav-link font-14">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                    </svg>
                                    info@site.com
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row top-menu justify-content-center align-items-center">
            <div class="col-lg-2 col-4 order-lg-1 order-2">
                <div class="top-menu-logo">
                    <a href="index.html"><img src="img/default-icon/logo.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-lg-6 text-center d-none d-lg-block order-lg-2 order-3">
                <div class="top-menu-search ">
                    <form action="" method="get">
                        <div class="input-group">
                            <input name="txt" type="text" class="search-txt rounded-pill"
                                   placeholder="نام محصول مورد نظر خود را وارد کنید">
                            <button type="submit" class="search-btn input-group-text rounded-pill">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-4 order-lg-3 order-3">
                <div class="top-menu-btn">
                    <ul class="nav ">
                        <li class="nav-item max-sm:hidden  ">
                            @if (Auth::guest())
                                <a href="{{ route('login')  }}">
                                 <button class="auth-btn-index pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                    </svg>
                                    ورود و عضویت
                                    </button>
                                </a>
                            @else

                                <button class="auth-btn-index pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                    </svg>
                                    حساب کاربری
                                </button>

                            @endif
                        </li>

                        <li class="nav-item sm:hidden">
                                <span class="auth-icon-responsive d-xl-none d-block pointer" data-bs-toggle="modal" data-bs-target="#loginModal">
                                    <div class="header-box">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                        </svg>
                                    </div>
                                </span>
                        </li>

                        <li class="nav-item position-relative">
                            <div class="header-box pointer" id="cartBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-bag" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                                <span class="count-item rounded-circle">0</span>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-12 col-4 order-lg-4 order-1 ">
                <div class="top-menu-menu d-lg-flex d-none">
                    <ul class="navbar-nav">
                        <li class="position-relative m-0"></li>
                        <li class="nav-item main-menu-head"><a href=""
                                                               class="nav-link border-animate fromCenter fw-bold"><i class="bi bi-list"></i>
                                مگا تب منو
                            </a>
                            <ul class="main-menu">
                                <li class="main-menu-sub-active-li"><a href=""><i class="bi bi-phone"></i>
                                        موبایل</a>
                                    <ul class="main-menu-sub back-menu"
                                        style=" background: #fff url('img/other/labtop.png') no-repeat;">
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                    </ul>
                                </li>
                                <li><a href=""><i class="bi bi-tablet"></i> تبلت</a>
                                    <ul class="main-menu-sub back-menu"
                                        style=" background: #fff url('img/other/labtop.png') no-repeat;">
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                    </ul>
                                </li>
                                <li><a href=""><i class="bi bi-shield"></i>آنتی ویروس</a>
                                    <ul class="main-menu-sub back-menu"
                                        style=" background: #fff url('img/other/labtop.png') no-repeat;">
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                    </ul>
                                </li>
                                <li><a href=""><i class="bi bi-laptop"></i>لبتاپ</a>
                                    <ul class="main-menu-sub back-menu"
                                        style=" background: #fff url('img/other/509-5092096_offering-high-quality-mobile-repair-service-main-image_prev_ui.png') no-repeat;">
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                    </ul>
                                </li>
                                <li><a href=""><i class="bi bi-tag-fill"></i>پر فروش ترین ها</a>
                                    <ul class="main-menu-sub back-menu"
                                        style=" background: #fff url('img/other/tablet-menu.png') no-repeat;">
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                    </ul>
                                </li>
                                <li><a href=""><i class="bi bi-car-front"></i>خودرو</a>
                                    <ul class="main-menu-sub back-menu"
                                        style=" background: #fff url('img/other/509-5092096_offering-high-quality-mobile-repair-service-main-image_prev_ui.png') no-repeat;">
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a class="title my-flex-baseline" href="">زیر منو شماره 1 <i
                                                    class="bi bi-chevron-left"></i></a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                        <li><a href="">زیر منو شماره 1</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link border-animate fromCenter">مگا لیست منو <i
                                    class="bi bi-tablet"></i></a>
                            <ul class="list-unstyled shadow-lg back-menu sub-menu"
                                style="background: #fff url('img/other/tablet-menu.png') no-repeat;">
                                <li><a href="" class="title">بـرند <i class="bi bi-chevron-left"></i></a></li>
                                <li><a href="">سامـسونگ</a></li>
                                <li><a href="">اپـل</a></li>
                                <li><a href="">شیـائومی</a></li>
                                <li><a href="">ال جی</a></li>
                                <li><a href="">وان پـلاس</a></li>
                                <li><a href="">جی ال ایـکس</a></li>
                                <li><a href="">هـو آوی</a></li>
                                <li><a href="">بلک بـری</a></li>
                                <li><a href="">توشـیبا</a></li>
                                <li><a href="">دایـناکورد</a></li>
                                <li><a href="" class="title">براساس رده بندی <i class="bi bi-chevron-left"></i></a>
                                </li>
                                <li><a href="">دکـمه ای</a></li>
                                <li><a href="">لـمسـی</a></li>
                                <li><a href="">نـظـامی</a></li>
                                <li><a href="">ضـد آب</a></li>
                                <li><a href="">مسـافرتی</a></li>
                                <li><a href="">خـارنی</a></li>
                                <li><a href="" class="title">براساس کشور <i class="bi bi-chevron-left"></i></a></li>
                                <li><a href="">ایران</a></li>
                                <li><a href="">ژاپن</a></li>
                                <li><a href="">فرانسه</a></li>
                                <li><a href="">کره جنوبی</a></li>
                                <li><a href="">آمریکا</a></li>
                                <li><a href="">سوئد</a></li>
                                <li><a href="">تایوان</a></li>
                                <li><a href="" class="title">براساس رنگ <i class="bi bi-chevron-left"></i></a></li>
                                <li><a href="">قرمز</a></li>
                                <li><a href="">قهوه ای</a></li>
                                <li><a href="">سبز</a></li>
                                <li><a href="">بنفش</a></li>
                                <li><a href="">نارنجی</a></li>
                                <li><a href="">نیلی</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link border-animate fromCenter">منو ساده<i
                                    class="bi bi-menu-app"></i></a>
                            <ul class="level-one">
                                <li><a href="">منو شماره 1</a></li>
                                <li><a href="">منو شماره 2</a></li>
                                <li class="position-relative"><a href="">منو شماره 3 <i
                                            class="bi bi-chevron-left"></i></a>
                                    <ul class="level-two">
                                        <li><a href="">1 زیر منو شماره </a></li>
                                        <li><a href="">2 زیر منو شماره </a></li>
                                        <li><a href="">3 زیر منو شماره </a></li>
                                    </ul>
                                </li>
                                <li><a href="">منو شماره 4</a></li>
                                <li><a href="">منو شماره 5</a></li>
                                <li><a href="">منو شماره 6</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link border-animate fromCenter">صفحات <i
                                    class="bi bi-newspaper"></i></a>
                            <ul class="level-one nav-row">
                                <li><a href="index.html">صفحه اصلی</a></li>
                                <li><a href="index2.html">صفحه اصلی دوم</a></li>
                                <li><a href="product.html">صفحه محصول</a></li>
                                <li><a href="category.html">صفحه دسته بندی</a></li>
                                <li><a href="cart.html">صفحه سبد خرید</a></li>
                                <li><a href="search.html">صفحه جستجو</a></li>
                                <li><a href="search-not-found.html">صفحه جستجو پیدا نشده</a></li>
                                <li><a href="category-product-row.html">دسته بندی محصولات خطی</a></li>
                                <li><a href="404.html">صفحه 404</a></li>
                                <li><a href="login.html">صفحه ورود</a></li>
                                <li><a href="register.html">صفحه ثبت نام</a></li>
                                <li><a href="forget.html">صفحه فراموشی رمز عبور</a></li>
                                <li><a href="blog.html">صفحه وبلاگ</a></li>
                                <li><a href="blog-detail.html">صفحه جزییات وبلاگ</a></li>
                                <li><a href="compare.html">صفحه مقایسه محصول</a></li>
                                <li><a href="checkout.html">پرداخت مرحله ای</a></li>
                                <li><a href="payment-ok.html">پرداخت موفق</a></li>
                                <li><a href="payment-nok.html">پرداخت ناموفق</a></li>
                                <li><a href="product-not-found.html">محصول ناموجود</a></li>
                                <li><a href="empty-cart.html">سبد خرید خالی</a></li>
                                <li><a href="dashboard.html"> داشبورد کاربری</a></li>
                                <li><a href="order.html">سفارشات</a></li>
                                <li><a href="favorite.html">محصولات مورد علاقه</a></li>
                                <li><a href="notification.html">اطلاعیه</a></li>
                                <li><a href="comments.html">نظرات</a></li>
                                <li><a href="address.html">آدرس ها</a></li>
                                <li><a href="last-seen.html">آخرین بازدید ها</a></li>
                                <li><a href="about-us.html">درباره ما</a></li>
                                <li><a href="contact-us.html">تماس با ما</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link border-animate fromCenter"> <i
                                    class="bi bi-tag"></i> تخفیف ها و پیشنهاد ها</a></li>
                        <li class="nav-item"><a href="" class="nav-link border-animate fromCenter">سوالی دارید</a>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link border-animate fromCenter">در رستا
                                بفروشید</a></li>
                    </ul>
                </div>
                <div class="responsive-menu d-block d-lg-none">
                    <div class="responsive-menu-icon">
                        <span id="showResponsiveMenu" class="pointer"><i class="bi bi-list"></i></span>
                    </div>
                    <div class="rm-body">
                        <div class="rm-overlay"></div>
                        <div class="rm-items">
                            <div class="rm-item-close pointer">
                                <i class="bi bi-x"></i>
                            </div>
                            <div class="rm-item-img">
                                <img src="img/default-icon/logo.png" alt="">
                            </div>
                            <div class="rm-item-search">
                                <div class="top-menu-search ">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input name="txt" type="text" class="search-txt rounded-pill"
                                                   placeholder="نام محصول مورد نظر خود را وارد کنید">
                                            <button type="submit" class="search-btn input-group-text rounded-pill">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <ul class="rm-item-menu navbar-nav">
                                <li class="nav-item bg-ul-f7"><a href="index.html" class="nav-link">صفحه اصلی</a>
                                </li>
                                <li class="nav-item bg-ul-f7">
                                    <a href="" class="nav-link">گوشی موبایل</a>
                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                    <ul class="navbar-nav h-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="">برند</a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0 bg-ul-f7">
                                                <li class="nav-item"><a href="" class="nav-link">سامسونگ</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">هوآوی</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">شیائومی</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">الجی</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">سونی</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">بر اساس رده بندی</a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0 bg-ul-f7">
                                                <li class="nav-item"><a href="" class="nav-link">لمسی</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">دکمه ای</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">نظامی</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item bg-ul-f7">
                                    <a href="" class="nav-link">تبلت</a>
                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                    <ul class="navbar-nav h-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="">کشور</a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0 bg-ul-f7">
                                                <li class="nav-item"><a href="" class="nav-link">ژاپن</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">کره جنوبی</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">آمریکایی</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">بر اساس رده بندی</a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0 bg-ul-f7">
                                                <li class="nav-item"><a href="" class="nav-link">لمسی</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">دانش آموزی</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">مخصوص بازی</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item bg-ul-f7">
                                    <a href="" class="nav-link">لپتاپ</a>
                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                    <ul class="navbar-nav h-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="">برند</a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0 bg-ul-f7">
                                                <li class="nav-item"><a href="" class="nav-link">ایسر</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">مایکروسافت</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">ایسوس</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">اپل</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">سونی</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">بر اساس قیمت</a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0 bg-ul-f7">
                                                <li class="nav-item"><a href="" class="nav-link">ارزان</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">اقتصادی</a></li>
                                                <li class="nav-item"><a href="" class="nav-link">گران</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item bg-ul-f7">
                                    <a href="" class="nav-link">صفحات</a>
                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                    <ul class="navbar-nav h-0">
                                        <li><a href="index.html">صفحه اصلی</a></li>
                                        <li class="nav-item"><a class="nav-link" href="product.html">صفحه محصول</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="category.html">صفحه دسته
                                                بندی</a></li>
                                        <li class="nav-item"><a class="nav-link" href="cart.html">صفحه سبد خرید</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="search.html">صفحه جستجو</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                                href="category-product-row.html">دسته بندی محصولات خطی</a></li>
                                        <li class="nav-item"><a class="nav-link" href="404.html">صفحه 404</a></li>
                                        <li class="nav-item"><a class="nav-link" href="login.html">صفحه ورود</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="register.html">صفحه ثبت
                                                نام</a></li>
                                        <li class="nav-item"><a class="nav-link" href="forget.html">صفحه فراموشی رمز
                                                عبور</a></li>
                                        <li class="nav-item"><a class="nav-link" href="blog.html">صفحه وبلاگ</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="blog-detail.html">صفحه جزییات
                                                وبلاگ</a></li>
                                        <li class="nav-item"><a class="nav-link" href="compare.html">صفحه مقایسه
                                                محصول</a></li>
                                        <li class="nav-item"><a class="nav-link" href="checkout.html">پرداخت مرحله
                                                ای</a></li>
                                        <li class="nav-item"><a class="nav-link" href="payment-ok.html">پرداخت
                                                موفق</a></li>
                                        <li class="nav-item"><a class="nav-link" href="payment-nok.html">پرداخت
                                                ناموفق</a></li>
                                        <li class="nav-item"><a class="nav-link" href="product-not-found.html">محصول
                                                ناموجود</a></li>
                                        <li class="nav-item"><a class="nav-link" href="empty-cart.html">سبد خرید
                                                خالی</a></li>
                                        <li class="nav-item"><a class="nav-link" href="dashboard.html"> داشبورد
                                                کاربری</a></li>
                                        <li class="nav-item"><a class="nav-link" href="order.html">سفارشات</a></li>
                                        <li class="nav-item"><a class="nav-link" href="favorite.html">محصولات مورد
                                                علاقه</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                                href="notification.html">اطلاعیه</a></li>
                                        <li class="nav-item"><a class="nav-link" href="comments.html">نظرات</a></li>
                                        <li class="nav-item"><a class="nav-link" href="address.html">آدرس ها</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="last-seen.html">آخرین بازدید
                                                ها</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
