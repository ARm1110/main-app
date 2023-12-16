<!-- resources/views/admin/profile/edit.blade.php -->

@extends('admin.panel')
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

            <h2 class="text-2xl font-semibold mb-6">ویرایش پروفایل</h2>


            <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600">عکس پروفایل</label>
                    <img src="{{ auth()->user()->image ?? 'https://xsgames.co/randomusers/avatar.php?g=pixel'}}" width="80" alt="تصویر" >

                </div>

                <div class="mb-4">
                    <div class="mb-4">
                        <label for="profile_image" class="block text-sm font-medium text-gray-600">تصویر پروفایل</label>
                        <input type="file" name="image" id="profile_image" class="mt-1 p-2 w-full border rounded-md" placeholder="انتخاب تصویر پروفایل">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">نام</label>
                    <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">ایمیل</label>
                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="current_password" class="block text-sm font-medium text-gray-600">گذرواژه </label>
                    <input type="password" name="current_password" id="current_password" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">گذرواژه جدید</label>
                    <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md">
                </div>


                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-600">تایید گذرواژه</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 p-2 w-full border rounded-md">
                </div>


                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">آپدیت پروفایل</button>
                </div>
            </form>
        </div>
    </div>
@endsection
