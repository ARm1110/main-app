@extends('admin.main')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow-md">

            <!-- Brand details -->
            <h1 class="text-3xl font-semibold mb-4">{{ $brand->name }}</h1>

            @if ($brand->image)
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="w-40 h-40">
                </div>
            @endif

            <!-- Brand products -->
            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-2">محصولات برند</h2>
                @if($brand->products->count())
                    <ul>
                        @foreach($brand->products as $product)
                            <li class="mb-2">
                                <a href="{{ route('admin.product.show', $product->id) }}" class="text-blue-500 hover:underline">
                                    {{ $product->name }}
                                </a>
                                - قیمت: {{ $product->price }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600">هیچ محصولی برای این برند ثبت نشده است.</p>
                @endif
            </div>

        </div>
    </div>
@endsection
