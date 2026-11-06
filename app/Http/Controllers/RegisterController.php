<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function admin()
    {

        return view('register_admin');

    }

    public function member()
    {

        return view('register_member');

    }

    public function storeAdmin(Request $request)
    {

        $request->validate([

            'name'=>'required',

            'npm'=>'required|unique:users',

            'alamat'=>'required',

            'telepon'=>'required',

            'email'=>'required|email|unique:users',

            'password'=>'required|min:6'

        ]);

        User::create([

            'name'=>$request->name,

            'npm'=>$request->npm,

            'alamat'=>$request->alamat,

            'telepon'=>$request->telepon,

            'email'=>$request->email,

            'password'=>Hash::make($request->password),

            'jenis'=>'admin'

        ]);

        return redirect('/login/admin')
        ->with('success','Admin berhasil dibuat');

    }

    public function storeMember(Request $request)
    {

        $request->validate([

            'name'=>'required',

            'npm'=>'required|unique:users',

            'alamat'=>'required',

            'telepon'=>'required',

            'email'=>'required|email|unique:users',

            'password'=>'required|min:6'

        ]);

        User::create([

            'name'=>$request->name,

            'npm'=>$request->npm,

            'alamat'=>$request->alamat,

            'telepon'=>$request->telepon,

            'email'=>$request->email,

            'password'=>Hash::make($request->password),

            'jenis'=>'member'

        ]);

        return redirect('/login/member')
        ->with('success','Member berhasil dibuat');

    }

}