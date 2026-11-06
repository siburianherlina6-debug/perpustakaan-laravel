@extends('layouts.member')

@section('content')

<div class="container-fluid">

    <a href="/member/buku" class="btn btn-secondary mb-3">

        <i class="fa-solid fa-arrow-left"></i>

        Kembali

    </a>

    <div class="card shadow border-0">

        <div class="row g-0">

            <div class="col-md-4">

                @if($buku->cover)

                <img src="{{ asset('cover/'.$buku->cover) }}"
                     class="img-fluid rounded-start"
                     style="height:100%;object-fit:cover;">

                @else

                <img src="https://via.placeholder.com/350x500?text=No+Cover"
                     class="img-fluid rounded-start">

                @endif

            </div>

            <div class="col-md-8">

                <div class="card-body">

                    <h2 class="fw-bold">

                        {{ $buku->judul }}

                    </h2>

                    <hr>

                    <table class="table">

                        <tr>

                            <th width="180">Kode Buku</th>

                            <td>{{ $buku->kode_buku }}</td>

                        </tr>

                        <tr>

                            <th>Pengarang</th>

                            <td>{{ $buku->pengarang }}</td>

                        </tr>

                        <tr>

                            <th>Penerbit</th>

                            <td>{{ $buku->penerbit }}</td>

                        </tr>

                        <tr>

                            <th>Tahun Terbit</th>

                            <td>{{ $buku->tahun_terbit }}</td>

                        </tr>

                        <tr>

                            <th>Stok</th>

                            <td>

                                @if($buku->stok>0)

                                <span class="badge bg-success">

                                    {{ $buku->stok }} Buku

                                </span>

                                @else

                                <span class="badge bg-danger">

                                    Habis

                                </span>

                                @endif

                            </td>

                        </tr>

                    </table>

                    <h5>

                        ⭐⭐⭐⭐☆

                    </h5>

                    <p class="text-muted">

                        Buku ini merupakan salah satu koleksi terbaik di perpustakaan dan dapat dipinjam oleh seluruh member yang masih memiliki kuota peminjaman.

                    </p>

                    @if($buku->stok>0)

                    <form action="/member/pinjam/{{ $buku->id }}" method="POST">

                        @csrf

                        <button class="btn btn-success btn-lg">

                            <i class="fa-solid fa-book"></i>

                            Pinjam Buku

                        </button>

                    </form>

                    @else

                    <button class="btn btn-danger btn-lg" disabled>

                        Stok Habis

                    </button>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection