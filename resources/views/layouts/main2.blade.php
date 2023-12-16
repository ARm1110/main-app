<!DOCTYPE html>
<html lang="fa" dir="rtl">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>فروشگاه رستا</title>
    <link rel="shortcut icon" href="{{asset('storage/asset/img/default-icon/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('storage/asset/img/default-icon/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('storage/asset/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('storage/asset/css/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('storage/asset/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('storage/asset/js/plugin/countdown/countdown.css')}}">
    <link rel="stylesheet" href="{{asset('storage/asset/js/plugin/back-to-top/jquery-backToTop.min.css')}}">
    <link rel="stylesheet" href="{{asset('storage/asset/js/plugin/hint-css/hint-css.css')}}">
    <link rel="stylesheet" href="{{asset('storage/asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('storage/asset/css/responsive.css')}}">
    @notifyCss
    @vite('resources/css/app.css')

</head>

<body>

@yield('content')
<x-notify::notify />
@notifyJs


<script src="{{asset('storage/asset/js/jquery-3.6.1.min.js')}}"></script>
<script src="{{asset('storage/asset/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('storage/asset/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('storage/asset/js/app.js')}}"></script>
<script src="{{asset('storage/asset/js/plugin/countdown/countdown.js')}}"></script>
<script src="{{asset('storage/asset/js/plugin/back-to-top/jquery-backToTop.min.js')}}"></script>
<script src="{{asset('storage/asset/js/plugin/hint-css/hint-css.js')}}"></script>
<script src="{{asset('storage/asset/js/jquery-app.js')}}"></script>
<script src="{{asset('storage/asset/js/plugin/waves/waves.js')}}"></script>
<script src="{{asset('storage/asset/js/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
@vite(['resources/css/app.css','resources/js/app.js'])



</body>

</html>
