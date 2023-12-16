<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\profile\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(UpdateRequest $request)
    {
        $user = auth()->user();

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->filled('password')) {
            $data['password'] = $request->input('password');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $path = "/uploads/" . $imageName;

            $data['image'] = $path;
        }

        $user->update($data);

        notify()->success('پروفایل با موفقیت به‌روزرسانی شد.', 'موفقیت آمیز');

        return redirect()->route('admin.profile.edit');
    }
}
