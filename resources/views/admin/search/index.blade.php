@extends('admin.main')
@section('content')
    <div class="container">
        <h1>جستجو</h1>
        <form action="{{ route('admin.search.results') }}" method="GET">
            <div class="form-group">
                <label for="query">عبارت جستجو:</label>
                <input type="text" name="query" id="query" class="form-control" placeholder="جستجو...">
            </div>
            <button type="submit" class="btn btn-primary mt-2">جستجو</button>
        </form>
    </div>
@endsection
