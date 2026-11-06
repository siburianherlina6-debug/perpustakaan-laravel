<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('user','buku')->get();

        return view('laporan.index', compact('peminjaman'));
    }

    public function cetak()
    {
        $peminjaman = Peminjaman::with('user','buku')->get();

        $pdf = Pdf::loadView('laporan.pdf', compact('peminjaman'));

        return $pdf->download('laporan-peminjaman.pdf');
    }
}