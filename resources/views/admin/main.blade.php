<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @notifyCss
</head>
<body>


    <x-notify::notify />



<x-layouts.admin.navbar>
</x-layouts.admin.navbar>





<div class="flex">
    <x-layouts.admin.sidbar>
    </x-layouts.admin.sidbar>

    @yield('content')

</div>

</body>
@notifyJs
@vite(['resources/css/app.css','resources/js/app.js'])
</html>
