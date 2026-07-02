<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
   public function registration()
   {
      return view('auth.login');
   }

   public function register(Request $request)
   {
      $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email|unique:users',
         'mobile' => 'required|string|max:20',
         'password' => 'required|min:6|confirmed',
      ]);

      User::create([
         'name' => $request->name,
         'email' => $request->email,
         'mobile' => $request->mobile,
         'cat' => $request->cat,
         'role' => 2, // Regular user
         'password' => bcrypt($request->password),
      ]);

      return redirect('/registration')->with('success', 'Registration Successful! Please login.');
   }
   public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 1) {
                // Admin dashboard
                return redirect('/admin/dashboard')->with('success', 'Login Successful');
            } else {
                // Regular user profile
                return redirect('/user/profile')->with('success', 'Login Successful');
            }
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/registration')->with('success', 'Logged Out Successfully');
    }

}
