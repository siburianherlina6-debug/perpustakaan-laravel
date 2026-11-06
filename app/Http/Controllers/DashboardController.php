<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $totalBuku = Buku::count();

        $totalMember = User::where('jenis', 'member')->count();

        $totalPinjam = Peminjaman::where('status', 'Dipinjam')->count();

        $totalKembali = Peminjaman::where('status', 'Dikembalikan')->count();

        // Grafik peminjaman per bulan
        $grafik = [];

        for ($i = 1; $i <= 12; $i++) {

            $grafik[] = Peminjaman::whereMonth('tanggal_pinjam', $i)->count();

        }

        // Buku terbaru
        $bukuTerbaru = Buku::latest()->take(5)->get();

        // Peminjaman terbaru
        $peminjamanTerbaru = Peminjaman::with('user', 'buku')
            ->latest()
            ->take(5)
            ->get();

        // Buku stok habis
        $stokHabis = Buku::where('stok', 0)->get();

        // Jumlah buku per kategori
        $kategori = Kategori::withCount('buku')->get();

        return view('dashboard', compact(
            'totalBuku',
            'totalMember',
            'totalPinjam',
            'totalKembali',
            'grafik',
            'bukuTerbaru',
            'peminjamanTerbaru',
            'stokHabis',
            'kategori'
        ));
    }
}