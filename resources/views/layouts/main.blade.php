<!DOCTYPE html>
<html lang="fa" dir="rtl">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>فروشگاه رستا</title>
    <link rel="shortcut icon" href="{{asset('asset/img/default-icon/favicon.ico')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('asset/img/default-icon/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('asset/img/default-icon/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}">
    @notifyCss
</head>

<body>

    @yield('content')

    <x-notify::notify />
    @notifyJs
    <script src="{{asset('asset/js/jquery-3.6.1.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('asset/js/app.js')}}"></script>
    <script src="{{asset('asset/js/jquery-app.js')}}"></script>
    <script src="{{asset('asset/js/plugin/waves/waves.js')}}"></script>




</body>

</html>
