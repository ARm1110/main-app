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
            <div class="row" style="min-height: inherit;">
                <div class="col-lg-8">
                    <div class="auth-forms">
                        <div class="auth-forms-item">
                            <div class="auth-logo d-lg-none d-block">
                                <a href="index.html"><img src="{{asset('storage/asset/img/default-icon/logo.png ')}}" class="img-fluid" alt=""></a>
                            </div>
                            <div class="auth-title">
                                <h3>ثبت نام کنید</h3>
                                <p class="my-3 text-muted">اگر قبلا ثبت نام کرده اید وارد شوید</p>
                            </div>
                            <div class="auth-form">
                                <form action="{{route('store.register')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="نام کاربری">
                                        </div>

                                    </div>
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
                                    <div class="d-flex justify-content-center flex-column align-items-center flex-wrap">
                                        <button type="submit" class="btn-login w-50 waves-effect waves-light"><i class="bi bi-person"></i>
                                             ثبت نام در سایت
                                        </button>
                                        <a class="btn-login login w-50 waves-effect waves-light" href="login.html"><i class="bi bi-lock"></i>
                                            ورود به سایت
                                        </a>
                                    </div>

                                </form>
                                <div class="social mt-3">
                                    <a href="" class="bi bi-google"></a>
                                    <a href="" class="bi bi-facebook"></a>
                                    <a href="" class="bi bi-github"></a>
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
                                <a href="index.html"><img src=" {{asset('storage/asset/img/default-icon/logo.png ')}}" class="img-fluid" alt=""></a>
                            </div>
                            <h3 class="fw-bold">خوش آمدید</h3>
                            <p class="my-3">
                                اگر قبلا ثبت نام کرده اید میتوانید از این قسمت وارد شوید
                            </p>
                            <a href="{{ route('show.login')  }}" class="btn-login-page waves-effect waves-light">وارد شوید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
