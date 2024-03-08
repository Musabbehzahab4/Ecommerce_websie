<?php

namespace App\Http\Controllers\authss;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect('/');
        }else{
            return view('authss.login');
        }
        }
    public function register(Request $request)
    {
        // return $request;die;
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->user_type = 1;
        $user->save();
        return view('authss.login');
    }
    public function loginuser(Request $request)
    {
        $a = $request->all();
        // print_r($a);
        // exit;
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('front')->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withErrors(['email' => 'Invalid email or password']);

    }

    public function logout()
    {
        Auth::logout();
        \Cart::clear();
        return redirect()->route('front')->withSuccess('You have Successfully Logout');
    }
}
