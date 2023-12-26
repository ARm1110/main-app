@extends('admin.panel')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow-md">

            <!-- Product details -->
            <h1 class="text-3xl font-semibold mb-4">{{ $product->name }}</h1>

            <p class="text-gray-600">{{ $product->description }}</p>

            <p class="text-lg font-bold mt-4">قیمت:{{ $product->price }}</p>

            <!-- Product images -->
            <div class="mt-6 flex">
                <h2 class="text-xl font-semibold mb-2">تصاویر</h2>
                @foreach($product->images as $image)
                    <div class="flex flex-col">
                    <img src="{{ asset($image->image_path) }}" alt="Product Image"  class="w-40 h-40 mb-4">
                    </div>
                @endforeach
            </div>

            <!-- Product videos -->
            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-2">فیلم ها</h2>
                @foreach($product->videos as $video)
                    <div class="flex flex-col justify-items-center w-full ">
                    <video  controls>
                        <source src="{{ asset($video->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
