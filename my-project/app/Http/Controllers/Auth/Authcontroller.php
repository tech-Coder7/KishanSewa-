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


      User::create([

         'name' => $request->name,
         'email' => $request->email,
         'mobile' => $request->mobile,
         'cat' => $request->cat,
         'role' => 1,
         'password' => bcrypt($request->password),

      ]);

      return redirect('/registration')->with('success', 'Registration Successfelly ');

   }

   public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/admin/dashboard')->with('success', 'Login Successful');
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/registration')->with('success', 'Logged Out Successfully');
    }

}
