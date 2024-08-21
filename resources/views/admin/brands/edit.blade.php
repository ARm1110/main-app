@extends('admin.main')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 border rounded-md shadow-md">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" id="error-alert">
                        {{ $error }}
                    </div>
                @endforeach
                <script>
                    // Add a script to make the alert sticky and auto-close after 5 seconds
                    document.addEventListener('DOMContentLoaded', function () {
                        var errorAlert = document.getElementById('error-alert');

                        // Make the alert sticky
                        errorAlert.style.position = 'sticky';
                        errorAlert.style.top = '0';

                        // Auto-close the alert after 5 seconds
                        setTimeout(function () {
                            errorAlert.style.opacity = '0';
                            setTimeout(function () {
                                errorAlert.style.display = 'none';
                            }, 1000);
                        }, 5000);
                    });
                </script>
            @endif

            <h2 class="text-2xl font-bold mb-4">ویرایش برند</h2>

            <form action="{{ route('admin.brands.update', ['brand' => $brand->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">نام برند</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" value="{{ old('name', $brand->name) }}" required>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">تصویر برند</label>
                    <input type="file" name="image" id="image" class="mt-1 p-2 border rounded-md w-full">
                    @if ($brand->image)
                        <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="mt-4 w-32 h-32 object-cover">
                    @endif
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">بروزرسانی برند</button>
                </div>
            </form>
        </div>
    </div>
@endsection
