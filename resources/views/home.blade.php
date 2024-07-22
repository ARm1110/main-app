@extends('layouts.main2')

@section('content')

{{--    <x-layouts.home.festival>--}}
{{--    </x-layouts.home.festival>--}}

    <x-layouts.home.navbar :categories="$data['categories']">
    </x-layouts.home.navbar>

    <x-layouts.home.main-slider>
    </x-layouts.home.main-slider>

{{--    <x-layouts.home.end-banner>--}}
{{--    </x-layouts.home.end-banner>--}}


{{--    <x-layouts.home.main-category>--}}
{{--    </x-layouts.home.main-category>--}}

{{--    <x-layouts.home.product-box-2 :specialOffers="$data['specialOffers']">--}}
{{--    </x-layouts.home.product-box-2>--}}

{{--    <x-layouts.home.brand :brands="$data['brands']">--}}
{{--    </x-layouts.home.brand>--}}

{{--    <x-layouts.home.footer>--}}
{{--    </x-layouts.home.footer>--}}


@endsection
