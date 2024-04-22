@extends('layouts.main')

@section('content')

    <div class="auths">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
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
                                    <h3>وارد شوید</h3>
                                    <p class="my-3 text-muted">اگر قبلا ثبت نام کرده اید وارد شوید</p>
                                </div>
                                <div class="auth-form">
                                    <form action="{{ route('handelLogin.login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                                <input type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="ایمیل">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                                <input type="password" name="password" placeholder="رمز عبور" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-check form-check-box">
                                            <input class="form-check-input" name="remember" type="checkbox" value="true"
                                                   id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                مرا فراموش نکن
                                            </label>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn-login me-2 waves-effect waves-light"><i class="bi bi-person"></i>
                                                ورود به
                                                سایت</button>
                                            <a class="btn-login forget waves-effect waves-light" href="{{route('password.request')}}"><i class="bi bi-person"></i>
                                                فراموشی رمز عبور
                                            </a>
                                        </div>

                                    </form>
                                    <div class="register-box">
                                        <div class="dash-border">
                                            <span>یا</span>
                                        </div>
                                        <div class="register-link">
                                            <a href="{{ route('show.register')  }}" class="btn btn-outline-secondary waves-effect waves-light">ثبت نام <i
                                                    class="bi bi-person-plus ms-1"></i></a>
                                        </div>
                                    </div>

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
