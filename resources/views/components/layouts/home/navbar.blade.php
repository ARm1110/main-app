<header >
    <div class="container-fluid">
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
                                <a href="{{route('user.show.dashboard')}}">
                                <button class="auth-btn-index pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                    </svg>
                                    حساب کاربری
                                </button>
                                </a>
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
                        <li class="nav-item main-menu-head"><a href="" class="nav-link border-animate fromCenter fw-bold"><i class="bi bi-list"></i>
                                منوی محصولات
                            </a>
                            <ul class="main-menu">
                                @foreach($categories as $category)
                                    <li class="main-menu-sub-active-li"><a href=""><i class="bi bi-phone"></i>
                                            {{$category->name}}</a>

                                            <ul class="main-menu-sub back-menu">
                                                @foreach($category->subcategories as $subcategory)
                                                <li class=""><a class="title my-flex-baseline" href=""> {{ $subcategory->name }} </a></li>
                                                @foreach($subcategory->childcategories as $childcategory)
                                                    <li><a href="">{{ $childcategory->name }}</a></li>
                                                @endforeach
                                                @endforeach
                                            </ul>

                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a href="{{route('home')}}" class="nav-link border-animate fromCenter">خانه</a>

                        <li class="nav-item"><a href="" class="nav-link border-animate fromCenter"> <i
                                    class="bi bi-tag"></i> تخفیف ها و پیشنهاد ها</a></li>

                        <li class="nav-item"><a href="{{route('show.products')}}" class="nav-link border-animate fromCenter">محصولات</a></li>
                        <li class="nav-item"><a href="" class="nav-link border-animate fromCenter">سوالی دارید</a>

                        </li>
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
                                @foreach($categories as $category)
                                <li class="nav-item bg-ul-f7">
                                    <a href="" class="nav-link">
                                        {{$category->name}}
                                    </a>
                                    <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                    <ul class="navbar-nav h-0">
                                        @foreach($category->subcategories as $subcategory)
                                        <li class="nav-item">
                                            <a class="nav-link" href="">
                                                {{ $subcategory->name }}
                                            </a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0 bg-ul-f7">
                                                @foreach($subcategory->childcategories as $childcategory)
                                                <li class="nav-item">
                                                    <a href="" class="nav-link">
                                                        {{$childcategory->name}}
                                                    </a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
