@extends('layouts.main2')

@section('content')

    <x-layouts.home.festival>
    </x-layouts.home.festival>

    <x-layouts.home.navbar :data="$data">
    </x-layouts.home.navbar>


    <x-layouts.user.dashboard>
    </x-layouts.user.dashboard>

    <x-layouts.home.footer>
    </x-layouts.home.footer>




@endsection
