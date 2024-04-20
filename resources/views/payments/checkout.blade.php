@extends('layouts.main2')

@section('content')
    <x-layouts.home.festival>
    </x-layouts.home.festival>

    <x-layouts.home.navbar :data="$data">
    </x-layouts.home.navbar>
    <style>
        .line-step-box.complete:nth-child(1):before {
            width: 100%;
        }
    </style>


    <div class="content">
        <div class="line-steps">
            <div class="container-fluid">
                <div class="line-step-container">
                    <div class="line-step">
                        <div class="line-step-boxs">
                            <div class="line-step-box complete">
                                <a href="#">
                                    <div class="icon">
                                        <i class="bi bi-bag"></i>
                                    </div>
                                    <p>سبد خرید</p>
                                </a>
                            </div>
                            <div class="line-step-box complete">
                                <a href="#">
                                    <div class="icon">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </div>
                                    <p>جزییات پرداخت</p>
                                </a>
                            </div>
                            <div class="line-step-box">
                                <a href="#">
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
                        <div class="col-lg-7">
                            <div class="checkout-forms">
                                <div class="checkout-form-title">
                                    <h5>جزییات پرداخت</h5>
                                    <h5 class="text-red-500">در صورت تغییر آدرس اطلاعات زیر را بروز کنید </h5>
                                </div>
                                <div class="checkout-form">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger" role="alert" id="error-alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                        <script>
                                            // Add a script to make the alert sticky and auto-close after 5 seconds
                                            document.addEventListener('DOMContentLoaded', function () {
                                                var errorAlert = document.getElementById('error-alert');

                                                // Make the alert sticky
                                                errorAlert.style.position = 'sticky';
                                                errorAlert.style.top = '0';

                                                // Auto-close the alert after 5 seconds
                                                setTimeout(function () {
                                                    errorAlert.style.opacity = '0';
                                                    setTimeout(function () {
                                                        errorAlert.style.display = 'none';
                                                    }, 1000);
                                                }, 5000);
                                            });
                                        </script>
                                    @endif
                                    <form action='{{route('checkout.post')}}' class="flex-col" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first_name" class="form-label">نام گیرنده<span class="text-danger ms-1">*</span></label>
                                                        <input type="text" id="first_name" value="{{  old('first_name') ?? $data['address']->first_name }}" name="first_name" class="form-control rounded-pill">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lname" class="form-label">نام خانوادگی گیرنده<span class="text-danger ms-1">*</span></label>
                                                        <input type="text" id="lname" value="{{  old('last_name') ?? $data['address']->last_name }}" name="last_name" class="form-control rounded-pill">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ostan" class="form-label">استان <span class="text-danger ms-1">*</span></label>
                                                        <select id="ostan" name="province_id" class="form-select rounded-pill">
                                                            <option value="" selected disabled>انتخاب استان</option>
                                                            @foreach($data['provinces'] as $province)
                                                                <option value="{{ $province->id }}" @if($province->id == old('province_id' ) or $province->id == $data['address']->province_id ) selected @endif >{{ $province->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="city" class="form-label">شهر <span class="text-danger ms-1">*</span></label>
                                                        <select id="city" name="city_id" class="form-select rounded-pill">
                                                            <option value="" selected disabled>انتخاب شهر</option>
                                                            @foreach($data['cities'] as $city)
                                                                <option value="{{ $city->id }}"  @if($city->id == old('city_id') or $city->id == $data['address']->city_id ) selected @endif>{{ $city->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="street" class="form-label">آدرس کامل<span class="text-danger ms-1">*</span></label>
                                            <input type="text" name="full_address" value="{{ old('full_address') ??  $data['address']->full_address }}"  placeholder="پلاک خانه و نام خیابان" id="street" class="form-control rounded-pill">
                                        </div>

                                        <div class="form-group">
                                            <label for="tel" class="form-label">تلفن ثابت<span class="text-danger ms-1">*</span></label>
                                            <input type="text" name="tel" id="tel" value="{{ old('tel') ??  $data['address']->tel}}"  placeholder=" تلفن ثابت با پیش شماره" class="form-control rounded-pill">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone"  class="form-label">تلفن همراه<span class="text-danger ms-1">*</span></label>
                                            <input type="text" id="phone" name="phone"   value="{{$data['user']->phone}}" class="form-control rounded-pill">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">آدرس ایمیل<span class="text-danger ms-1">*</span></label>
                                            <input type="text" id="email" name="email"  value="{{$data['user']->email}}" class="form-control rounded-pill">
                                        </div>
                                        <div class="form-group">
                                            <label for="postal-code" class="form-label">کد پستی<span class="text-danger ms-1">*</span></label>
                                            <input type="text" name="postal_code" value="{{ old('postal_code') ??  $data['address']->postal_code}}"   placeholder='کد پستی را بادقت وارد کنید' id="postal-code" class="form-control rounded-pill">
                                        </div>
                                        <div class="form-group">
                                            <label for="descOrder" class="form-label">یادداشت های سفارش اختیاری<span class="text-danger ms-1">*</span></label>
                                            <textarea id="descOrder" name="description"    rows="5" class="form-control rounded-3" placeholder="نکاتی در مورد سفارش به عنوان مثال نکاتی برای تحویل">
                                                {{ old('description')}}
                                            </textarea>
                                        </div>
                                        <button type="submit" class=" w-full p-3 btn bg-green-400 text-white hover:bg-green-600">ذخیره</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="cart-payment">
                                <div class="title text-center">
                                    <h4 class="fw-bold">مجموع کل سبد خرید</h4>
                                </div>
                                <table class="table main-table">
                                    <tbody>
                                    <tr>
                                        <th class="pb-3">عنوان</th>
                                        <th class="pb-3">قیمت کل</th>
                                    </tr>

                                    <tr>
                                        <td class="fw-bold">مجموع</td>
                                        <td class="txt"><span class="fw-bold">{{number_format($data['carts'])}}</span> <span class="text-muted">تومان</span></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="category-filter">
                                    <div class="category-filter-box">
                                        <div class="category-filter-box-title">
                                            <h4 class="fw-bold">
                                                انتخاب بانک
                                            </h4>
                                        </div>
                                        <div class="category-filter-box-desc">
                                            <form action="">
                                                <div class="form-group form-check">
                                                    <input class="form-check-input" type="radio" id="bankOne" checked="" name="available">
                                                    <label class="form-check-label" for="bankOne">بانک ملت</label>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-check-input" type="radio" id="bankTwo" name="available">
                                                    <label class="form-check-label" for="bankTwo">بانک تجارت</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('createPayment',['amount'=>$data['carts']])  }}" method="POST">
                                    @csrf
                                    <button class="btn-bank waves-effect waves-light">پرداخت

                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Handle province selection change
            $('#ostan').change(function () {
                var selectedProvince = $(this).val();

                // Clear and disable city dropdown
                $('#city').empty().prop('disabled', true);

                if (selectedProvince) {
                    // Make an AJAX request to fetch cities based on the selected province
                    $.ajax({
                        url: '/get-cities/' + selectedProvince,
                        method: 'GET',
                        success: function (data) {
                            // Populate city dropdown with fetched data
                            $.each(data, function (key, value) {
                                $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });

                            // Enable city dropdown
                            $('#city').prop('disabled', false);
                        },
                        error: function () {
                            console.error('Error fetching cities.');
                        }
                    });
                }
            });
        });
    </script>




    <x-layouts.home.footer>
    </x-layouts.home.footer>


@endsection
