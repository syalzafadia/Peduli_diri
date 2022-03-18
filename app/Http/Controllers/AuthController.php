<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'nik' => 'required|min:16',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt(['nik' =>$request->nik, 'password' => $request->password])) {
            return redirect()->back();
        }

        return redirect()->route('home');

    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'nik' => 'required|min:16|unique:users',
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'password_confirmation' => bcrypt($request->password_confirmation),
        ]);

        //user login
        auth()->loginUsingId($user->id);


        return redirect()->route('home');
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
