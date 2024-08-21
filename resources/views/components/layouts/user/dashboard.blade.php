<div class="content">
    <div class="dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ui-boxs">
                        <div class="ui-box">
                            <div class="ui-box-item ">
                                <div class="ui-box-item-desc flex-col  " style="border-radius: 10px;background-color: #fff;">
                                    <div class="dashboard-user-img-profile  w-full  flex justify-content-center">
                                        <img src="{{ auth()->user()->image ?? 'https://xsgames.co/randomusers/avatar.php?g=pixel'  }}" width="80" height="80"
                                             class="img-fluid rounded-circle " alt="">
                                    </div>
                                    <div class="dashboard-user-info">
                                        <h6 class="user-name">{{ auth()->user()->username }}</h6>
                                        <h6 class="text-muted user-number">{{ auth()->user()->phone ?? 'شماره تماس خالی است' }}</h6>
                                    </div>
                                    <div class="dashboard-user-btn">
                                        <div>
                                            <i class="bi bi-key"></i>
                                            <a href="forget.html" class="text-muted">تغییر رمز عبور</a>
                                        </div>
                                        <div>
                                            <i class="bi bi-arrow-left-circle"></i>
                                            <a href="index.html" class="text-muted">خروج از حساب</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box">
                            <div class="ui-box-item">
                                <div class="ui-box-item-title" style="padding: 15px;">
                                    <h4 class="fw-bold">
                                        حساب کاربری شما
                                    </h4>
                                </div>
                                <div class="ui-box-item-desc p-0">
                                    <ul class="nav flex-column sidebar-menu">
                                        <li class="nav-item active">
                                            <a href="dashboard.html" class="nav-link text-muted">
                                                <i class="bi bi-house"></i>
                                                <span>ناحیه کاربری</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="profile.html" class="nav-link text-muted">
                                                <i class="bi bi-person-circle"></i>
                                                <span>نمایه کاربری</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="order.html" class="nav-link text-muted">
                                                <i class="bi bi-basket-fill"></i>
                                                <span>سفارش ها</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="favorite.html" class="nav-link text-muted">
                                                <i class="bi bi-heart"></i>
                                                <span>علاقه مندی ها</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="notification.html" class="nav-link text-muted">
                                                <i class="bi bi-chat-dots"></i>
                                                <span>اطلاعیه ها</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="comments.html" class="nav-link text-muted">
                                                <i class="bi bi-pencil"></i>
                                                <span>نقد و نظرات</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="address.html" class="nav-link text-muted">
                                                <i class="bi bi-pin-map"></i>
                                                <span>آدرس ها</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="last-seen.html" class="nav-link text-muted">
                                                <i class="bi bi-eye"></i>
                                                <span>بازدید های اخیر</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="content-box" style="padding:40px 20px;">
                        <div class="row g-3">
                            <div class="col-xl-3 col-6 dashboard-cart-col">
                                <div class="dashboard-cart shadow-box">
                                    <div class="dashboard-cart-title"><i class="bi bi-bag-check"></i> سفارشات تکمیل
                                        شده</div>
                                    <div class="dashboard-cart-footer" style="background: #0476D0;">0</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6 dashboard-cart-col">
                                <div class="dashboard-cart shadow-box">
                                    <div class="dashboard-cart-title"><i class="bi bi-activity"></i> سفارشات در
                                        انتظار بررسی</div>
                                    <div class="dashboard-cart-footer" style="background: #F6A21E;">0</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6 dashboard-cart-col">
                                <div class="dashboard-cart shadow-box">
                                    <div class="dashboard-cart-title"><i class="bi bi-x-octagon"></i> سفارشات لغو
                                        شده</div>
                                    <div class="dashboard-cart-footer" style="background: #0db47f;">0</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6 dashboard-cart-col">
                                <div class="dashboard-cart shadow-box">
                                    <div class="dashboard-cart-title"><i class="bi bi-repeat"></i> سفارشات مرجوعی
                                    </div>
                                    <div class="dashboard-cart-footer" style="background: #BA0F30;">0</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ui-box">
                                    <div class="ui-box-item ui-box-white">
                                        <div class="ui-box-item-title">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="fw-bold">
                                                    اطلاعات شخصی
                                                </h4>
                                                <a class="btn-main btn-main-primary waves-effect waves-light waves-effect waves-light" href="">ویرایش <i
                                                        class="bi bi-pencil-fill"></i></a>
                                            </div>
                                        </div>
                                        <div class="ui-box-item-desc p-0">
                                            <table class="table main-table shadow-none main-table-2">
                                                <tr>
                                                    <td colspan="2">
                                                        <h6 class="text-muted">نام و نام خانوادگی</h6>
                                                        <p class="fw-bold mt-2">امیر رضایی</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <h6 class="text-muted">شماره تلفن</h6>
                                                        <p class="fw-bold mt-2">09165550000</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <h6>پست الکترونیک</h6>
                                                        <p class="fw-bold mt-2">Amir@gmail.com</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <h6>کد ملی</h6>
                                                        <p class="fw-bold mt-2">61400011133322</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <h6>عضویت</h6>
                                                        <p class="fw-bold mt-2">8 آبان 1401</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <h6>کد پستی </h6>
                                                        <p class="fw-bold mt-2">_</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <h6>آدرس: </h6>
                                                        <p class="fw-bold mt-2">خرم آباد شهریار انتهای کوچه</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ui-box">
                                    <div class="ui-box-item ui-box-white">
                                        <div class="ui-box-item-title">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="fw-bold">
                                                    علاقه مندی ها
                                                </h4>
                                                <a class="btn-main btn-main-primary waves-effect waves-light" href="">مشاهده همه <i
                                                        class="bi bi-list-stars"></i></a>
                                            </div>
                                        </div>
                                        <div class="ui-box-item-desc">
                                            <div class="product-list-row">
                                                <div class="product-row">
                                                    <a href="product.html">
                                                        <div class="product-row-desc">
                                                            <div class="product-row-desc-item">
                                                                <div class="product-row-img">
                                                                    <img src="img/product/product-image1.jpg" alt=""
                                                                         class="" width="100">
                                                                </div>
                                                                <div class="product-row-title">
                                                                    <h6>گوشی موبایل سامسونگ مدل Galaxy A50
                                                                        SM-A505F/DS دو سیم کارت ظرفیت 128گیگابایت
                                                                    </h6>
                                                                    <div class="product-price">
                                                                        <p>7,500,000 تومان</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="product-row-icon">
                                                                <a href=""><i class="bi bi-trash"></i></a>
                                                                <a href=""><i class="bi bi-cart-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="product-row">
                                                    <a href="product.html">
                                                        <div class="product-row-desc">
                                                            <div class="product-row-desc-item">
                                                                <div class="product-row-img">
                                                                    <img src="img/product/wach3.jpg" alt="" class=""
                                                                         width="100">
                                                                </div>
                                                                <div class="product-row-title">
                                                                    <h6>گوشی موبایل سامسونگ مدل Galaxy A50
                                                                        SM-A505F/DS دو سیم کارت ظرفیت 128گیگابایت
                                                                    </h6>
                                                                    <div class="product-price">
                                                                        <p>7,500,000 تومان</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="product-row-icon">
                                                                <a href=""><i class="bi bi-trash"></i></a>
                                                                <a href=""><i class="bi bi-cart-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="product-row">
                                                    <a href="product.html">
                                                        <div class="product-row-desc">
                                                            <div class="product-row-desc-item">
                                                                <div class="product-row-img">
                                                                    <img src="img/product/product-image2.jpg" alt=""
                                                                         class="" width="100">
                                                                </div>
                                                                <div class="product-row-title">
                                                                    <h6>گوشی موبایل سامسونگ مدل Galaxy A50
                                                                        SM-A505F/DS دو سیم کارت ظرفیت 128گیگابایت
                                                                    </h6>
                                                                    <div class="product-price">
                                                                        <p>7,500,000 تومان</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="product-row-icon">
                                                                <a href=""><i class="bi bi-trash"></i></a>
                                                                <a href=""><i class="bi bi-cart-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="ui-boxs">
                                    <div class="ui-box">
                                        <div class="ui-box-item ui-box-white">
                                            <div class="ui-box-item-title" style="padding: 15px;">
                                                <h4 class="fw-bold">
                                                    آخرین سفارش ها
                                                </h4>
                                            </div>
                                            <div class="ui-box-item-desc p-0">
                                                <div class="orders">
                                                    <div class="order-item">
                                                        <a href="order-detail.html">
                                                            <div class="order-item-status">
                                                                <div class="order-item-status-item">
                                                                    <p><i class="bi bi-bag-check-fill"></i>
                                                                        <span>تحویل شده</span></p>
                                                                </div>
                                                                <div class="order-item-status-item">
                                                                    <p><i
                                                                            class="bi bi-arrow-left pointer text-dark"></i>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="order-item-detail">
                                                                <ul class="nav">
                                                                    <li class="nav-item text-muted">29 خرداد 1399
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <span class="text-mute">کد سفارش</span>
                                                                        <strong>17745651</strong>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <span class="text-mute">مبلغ</span>
                                                                        <strong>25,000,000 تومان</strong>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="order-item-product-list">
                                                                <div class="order-item-product-list-item">
                                                                    <img src="img/product/product-image1.jpg" alt=""
                                                                         class="img-thumbnail" width="70"
                                                                         height="70">
                                                                </div>
                                                                <div class="order-item-product-list-item">
                                                                    <img src="img/product/product-image3.jpg" alt=""
                                                                         class="img-thumbnail" width="70"
                                                                         height="70">
                                                                </div>
                                                                <div class="order-item-product-list-item">
                                                                    <img src="img/product/product-image4.jpg" alt=""
                                                                         class="img-thumbnail" width="70"
                                                                         height="70">
                                                                </div>
                                                                <div class="order-item-product-list-item">
                                                                    <img src="img/product/product-image5.jpg" alt=""
                                                                         class="img-thumbnail" width="70"
                                                                         height="70">
                                                                </div>
                                                                <div class="order-item-product-list-item">
                                                                    <img src="img/product/product-image6.jpg" alt=""
                                                                         class="img-thumbnail" width="70"
                                                                         height="70">
                                                                </div>
                                                            </div>
                                                            <div class="order-item-show">
                                                                <p><i class="bi bi-card-list"></i> مشاهده فاکتور</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard -->
</div>
