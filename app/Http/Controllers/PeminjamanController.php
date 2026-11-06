<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{

    public function index()
    {

        $pinjam=Peminjaman::with('user','buku')->get();

        return view('peminjaman.index',compact('pinjam'));

    }

    public function create()
    {

        $anggota=User::where('jenis','member')->get();

        $buku=Buku::all();

        return view('peminjaman.create',compact('anggota','buku'));

    }

   public function store(Request $request)
{

    $request->validate([

        'user_id'=>'required',

        'buku_id'=>'required',

        'tanggal_pinjam'=>'required',

        'tanggal_kembali'=>'required'

    ]);

    $buku=Buku::find($request->buku_id);

    if($buku->stok<=0)
    {

        return back()->with('error','Stok Buku Habis');

    }

    Peminjaman::create([

        'user_id'=>$request->user_id,

        'buku_id'=>$request->buku_id,

        'tanggal_pinjam'=>$request->tanggal_pinjam,

        'tanggal_kembali'=>$request->tanggal_kembali,

        'status'=>'Dipinjam'

    ]);

    $buku->stok--;

    $buku->save();

    return redirect('/peminjaman')

    ->with('success','Peminjaman Berhasil');

}
}