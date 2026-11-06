<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class MemberBukuController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;

        $buku = Buku::when($cari, function ($query) use ($cari) {
                $query->where('judul', 'like', "%{$cari}%")
                      ->orWhere('pengarang', 'like', "%{$cari}%")
                      ->orWhere('penerbit', 'like', "%{$cari}%");
            })
            ->latest()
            ->paginate(8);

        return view('member.buku', compact('buku'));
    }

    public function detail($id)
    {
        $buku = Buku::findOrFail($id);

        return view('member.detail', compact('buku'));
    }

    public function pinjam($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok buku habis.');
        }

        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $buku->id,
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_kembali' => date('Y-m-d', strtotime('+7 days')),
            'status' => 'Dipinjam'
        ]);

        $buku->stok -= 1;
        $buku->save();

        return back()->with('success', 'Buku berhasil dipinjam.');
    }
}