@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">📚 Data Kategori Buku</h2>
            <small class="text-muted">
                Kelola semua kategori buku perpustakaan
            </small>
        </div>

        <a href="{{ route('kategori.create') }}" class="btn btn-primary">
            + Tambah Kategori
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>
                        <th width="80">No</th>
                        <th>Nama Kategori</th>
                        <th width="180">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($kategori as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->nama }}</td>

                        <td>

                            <a href="{{ route('kategori.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('kategori.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus kategori ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3" class="text-center">
                            Belum ada kategori.
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection