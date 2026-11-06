<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{

    public function verifikasi()
    {
        return view('verifikasi_npm');
    }

    public function cekNpm(Request $request)
    {

        $request->validate([

            'npm'=>'required'

        ]);

        if($request->npm==Auth::user()->npm)
        {

            session()->put('npm_verified',true);

            return redirect('/member');

        }

        return back()->with('error','NPM Salah');

    }

    public function index()
{
    if (!session('npm_verified')) {
        return redirect('/verifikasi-npm');
    }

    return view('member.dashboard');
}
public function riwayat()
{

$riwayat=Peminjaman::where('user_id',auth()->id())

->latest()

->get();

return view('member.riwayat',compact('riwayat'));

}
public function profil()
{
    return view('member.profil');
}

public function updateProfil(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);

    $user = auth()->user();

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return back()->with('success', 'Profil berhasil diperbarui.');
}
    public function denda()
{
    $denda = Peminjaman::with('buku')
        ->where('user_id', auth()->id())
        ->where('denda', '>', 0)
        ->get();

    return view('member.denda', compact('denda'));
}
public function reservasi()
{
    return view('member.reservasi');
}
}