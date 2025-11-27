<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|max:25',
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect(); // arahkan ke halaman user
        }
        return back()->withErrors(['failed' => 'Login gagal!']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|max:50|min:8|confirmed',
            'password_confirmation' => 'required|max:50|min:8|same:password',
        ]);
        $request['status'] = 'verify';
        $user = User::create($request->all());
        Auth::login($user);
        return redirect(); // arahkan ke halaman user
    }

    public function logout(){
        Auth::logout(Auth::user());
        return redirect('/');
    }
}
