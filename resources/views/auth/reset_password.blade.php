@extends('layouts.main')

@section('content')

    <div class="auths">
        <div class="container">

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
            <div class="auth shadow-box">
                <div class="row" style="min-height:inherit;">
                    <div class="col-lg-8">
                        <div class="auth-forms">
                            <div class="auth-forms-item">
                                <div class="auth-title">
                                    <div class="auth-logo d-lg-none d-block">
                                        <a href="index.html"><img src="img/default-icon/logo.png" class="img-fluid"
                                                                  alt=""></a>
                                    </div>
                                    <h3>فراموشی رمز عبور</h3>
                                    <p class="my-3 text-muted">برای بازگرداندن حساب خود ایمیل وارد کنید</p>
                                </div>
                                <div class="auth-form">
                                    <form action="{{ route('post_password.reset',['token'=>$user]) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                                <input type="password" name="password" placeholder="رمز عبور" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                                <input type="password" name="password_confirmation" placeholder="تکرار رمز عبور" class="form-control">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn-login me-2 waves-effect waves-light"><i class="bi bi-person"></i>
                                                ذخیره</button>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="auth-side d-lg-block d-none">
                            <div class="background">
                                <div class="cube"></div>
                                <div class="cube"></div>
                                <div class="cube"></div>
                                <div class="cube"></div>
                                <div class="cube"></div>
                            </div>
                            <div class="auth-desc">
                                <div class="auth-logo">
                                    <a href="index.html"><img src="img/default-icon/logo.png" class="img-fluid" alt=""></a>
                                </div>
                                <h3 class="fw-bold">خوش آمدید</h3>
                                <p class="my-3">برای ورود به سایت باید در سایت ثبت نام کنید
                                </p>
                                <a href="{{ route('show.register')  }}" class="btn-login-page waves-effect waves-light">ثبت نام در سایت</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
