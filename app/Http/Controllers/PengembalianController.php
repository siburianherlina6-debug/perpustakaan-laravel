<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function index()
    {
        $pinjam = Peminjaman::with('user', 'buku')->get();

        return view('pengembalian.index', compact('pinjam'));
    }

    public function kembalikan($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        if ($pinjam->status == "Dipinjam") {

            // Tanggal hari ini
            $hariIni = Carbon::now();

            // Tanggal jatuh tempo
            $jatuhTempo = Carbon::parse($pinjam->tanggal_kembali);

            // Hitung keterlambatan
            $terlambat = 0;

            if ($hariIni->gt($jatuhTempo)) {
                $terlambat = $hariIni->diffInDays($jatuhTempo);
            }

            // Denda Rp1.000 per hari
            $denda = $terlambat * 1000;

            // Update data peminjaman
            $pinjam->status = "Dikembalikan";
            $pinjam->denda = $denda;
            $pinjam->save();

            // Tambah stok buku
            $buku = Buku::find($pinjam->buku_id);

            if ($buku) {
                $buku->stok += 1;
                $buku->save();
            }
        }

        return redirect('/pengembalian')
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}