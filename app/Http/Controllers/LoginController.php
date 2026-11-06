<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function admin()
    {

        return view('login_admin');

    }

    public function member()
    {

        return view('login_member');

    }

    public function login(Request $request)
    {

        $request->validate([

            'email'=>'required',

            'password'=>'required'

        ]);

        if(Auth::attempt([

            'email'=>$request->email,

            'password'=>$request->password

        ]))
        {

            $request->session()->regenerate();

           if(Auth::user()->jenis=="admin")
{
    return redirect('/dashboard');
}

session()->forget('npm_verified');

return redirect('/verifikasi-npm');

        }

        return back()->with('error','Email atau Password Salah');

    }

   public function logout()
{

    session()->forget('npm_verified');

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');

}

}