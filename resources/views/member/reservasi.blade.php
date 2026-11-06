@extends('layouts.member')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4>📌 Reservasi Buku</h4>

        </div>

        <div class="card-body text-center">

            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                 width="140"
                 class="mb-3">

            <h5>Belum Ada Reservasi</h5>

            <p class="text-muted">
                Saat ini Anda belum melakukan reservasi buku.
            </p>

            <a href="/member/buku" class="btn btn-success">
                Cari Buku
            </a>

        </div>

    </div>

</div>

@endsection