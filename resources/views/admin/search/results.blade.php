@extends('admin.main')
@section('content')
    <div class="container">
        <h1>نتایج جستجو برای: {{ $query }}</h1>

        @if ($products->isEmpty())
            <p>هیچ محصولی یافت نشد.</p>
        @else
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-primary">مشاهده محصول</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
