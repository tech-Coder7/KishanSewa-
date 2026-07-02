<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        if (Auth::user()->role == 1) {
            return redirect('/admin/dashboard');
        }
        return view('user.profile');
    }

    public function edit()
    {
        if (Auth::user()->role == 1) {
            return redirect('/admin/dashboard');
        }
        return view('user.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'cat' => 'nullable|string',
        ]);

        $user->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'cat' => $request->cat,
        ]);

        return redirect('/user/profile')->with('success', 'Profile updated successfully!');
    }
}
