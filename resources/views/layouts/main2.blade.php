<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه عطرآرا</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
{{--    <link rel="shortcut icon" href="{{asset('asset/img/default-icon/favicon.ico')}}" type="image/x-icon">--}}
{{--    <link rel="icon" href="{{asset('asset/img/default-icon/favicon.ico')}}" type="image/x-icon">--}}
{{--    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.rtl.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('asset/css/bootstrap-icons/bootstrap-icons.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('asset/css/swiper-bundle.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('asset/js/plugin/countdown/countdown.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('asset/js/plugin/back-to-top/jquery-backToTop.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('asset/js/plugin/hint-css/hint-css.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}">--}}
    @notifyCss
    @vite('resources/css/app.css')

</head>

<body>

@yield('content')
<x-notify::notify />
@notifyJs


{{--<script src="{{asset('asset/js/jquery-3.6.1.min.js')}}"></script>--}}
{{--<script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('asset/js/swiper-bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('asset/js/app.js')}}"></script>--}}
{{--<script src="{{asset('asset/js/plugin/countdown/countdown.js')}}"></script>--}}
{{--<script src="{{asset('asset/js/plugin/back-to-top/jquery-backToTop.min.js')}}"></script>--}}
{{--<script src="{{asset('asset/js/plugin/hint-css/hint-css.js')}}"></script>--}}
{{--<script src="{{asset('asset/js/jquery-app.js')}}"></script>--}}
{{--<script src="{{asset('asset/js/plugin/waves/waves.js')}}"></script>--}}
{{--<script src="{{asset('asset/js/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>


</body>

</html>
