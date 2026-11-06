<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = Buku::with('kategori');

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('kode_buku', 'like', '%' . $request->search . '%')
                  ->orWhere('pengarang', 'like', '%' . $request->search . '%');
            });
        }

        // Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        $buku = $query->latest()->paginate(10);
        $kategori = Kategori::all();

        return view('buku.index', compact('buku', 'kategori'));
    }

   public function create()
{
    $kategori = Kategori::all();

    return view('buku.create', compact('kategori'));
}

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku'     => 'required|unique:bukus',
            'judul'         => 'required',
            'kategori_id'   => 'required|exists:kategoris,id',
            'pengarang'     => 'required',
            'penerbit'      => 'required',
            'tahun_terbit'  => 'required|numeric',
            'stok'          => 'required|integer|min:0',
            'cover'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('cover');

        if ($request->hasFile('cover')) {

            $namaFile = time() . '.' . $request->cover->extension();

            $request->cover->move(public_path('cover'), $namaFile);

            $data['cover'] = $namaFile;
        }

        Buku::create($data);

        return redirect('/buku')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();

        return view('buku.edit', compact('buku', 'kategori'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'kode_buku'     => 'required|unique:bukus,kode_buku,' . $buku->id,
            'judul'         => 'required',
            'kategori_id'   => 'required|exists:kategoris,id',
            'pengarang'     => 'required',
            'penerbit'      => 'required',
            'tahun_terbit'  => 'required|numeric',
            'stok'          => 'required|integer|min:0',
            'cover'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('cover');

        if ($request->hasFile('cover')) {

            // Hapus cover lama
            if ($buku->cover && File::exists(public_path('cover/' . $buku->cover))) {
                File::delete(public_path('cover/' . $buku->cover));
            }

            $namaFile = time() . '.' . $request->cover->extension();

            $request->cover->move(public_path('cover'), $namaFile);

            $data['cover'] = $namaFile;
        }

        $buku->update($data);

        return redirect('/buku')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        if ($buku->cover && File::exists(public_path('cover/' . $buku->cover))) {
            File::delete(public_path('cover/' . $buku->cover));
        }

        $buku->delete();

        return redirect('/buku')
            ->with('success', 'Data buku berhasil dihapus.');
    }
}