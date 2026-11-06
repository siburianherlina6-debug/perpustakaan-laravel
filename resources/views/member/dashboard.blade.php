@extends('layouts.member')

@section('content')

<div class="row">

    <div class="col-md-2">

        <div class="card-box bg-blue">

            <h2>{{ \App\Models\Buku::count() }}</h2>

            <h5>📚 Total Buku</h5>

        </div>

    </div>

    <div class="col-md-2">

        <div class="card-box bg-green">

            <h2>{{ \App\Models\Peminjaman::where('user_id',Auth::id())->where('status','Dipinjam')->count() }}</h2>

            <h5>📖 Dipinjam</h5>

        </div>

    </div>

    <div class="col-md-2">

        <div class="card-box bg-orange">

            <h2>{{ \App\Models\Peminjaman::where('user_id',Auth::id())->count() }}</h2>

            <h5>📜 Riwayat</h5>

        </div>

    </div>

    <div class="col-md-2">

        <div class="card-box bg-red">

            <h2>Rp0</h2>

            <h5>💰 Denda</h5>

        </div>

    </div>

    <div class="col-md-2">

        <div class="card-box bg-purple">

            <h2>0</h2>

            <h5>📌 Reservasi</h5>

        </div>

    </div>

    <div class="col-md-2">

        <div class="card-box bg-info2">

            <h2>5</h2>

            <h5>⭐ Favorit</h5>

        </div>

    </div>

</div>

<div class="row">

<div class="col-md-8">

<div class="card shadow">

<div class="card-header bg-success text-white">

📚 Buku Terbaru

</div>

<div class="card-body">

<div class="row">

@foreach(\App\Models\Buku::latest()->take(6)->get() as $buku)

<div class="col-md-4 mb-4">

<div class="card h-100 shadow-sm">

@if($buku->cover)

<img src="{{ asset('cover/'.$buku->cover) }}" height="220" style="object-fit:cover">

@else

<img src="https://via.placeholder.com/250x220?text=No+Cover">

@endif

<div class="card-body">

<h6>

{{ $buku->judul }}

</h6>

<p>

<small>

{{ $buku->pengarang }}

</small>

</p>

@if($buku->stok>0)

<span class="badge bg-success">

Stok {{ $buku->stok }}

</span>

@else

<span class="badge bg-danger">

Habis

</span>

@endif

<br><br>

<a href="/member/buku" class="btn btn-success btn-sm w-100">

Lihat Buku

</a>

</div>

</div>

</div>

@endforeach

</div>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow mb-3">

<div class="card-header bg-primary text-white">

👤 Profil Member

</div>

<div class="card-body">

<p><b>Nama :</b> {{ Auth::user()->name }}</p>

<p><b>NPM :</b> {{ Auth::user()->npm }}</p>

<p><b>Email :</b> {{ Auth::user()->email }}</p>

<p><b>Status :</b> {{ Auth::user()->jenis }}</p>

</div>

</div>

<div class="card shadow mb-3">

<div class="card-header bg-warning">

📢 Pengumuman

</div>

<div class="card-body">

<ul>

<li>Perpustakaan buka pukul 08.00 - 20.00</li>

<li>Denda Rp1.000 / hari</li>

<li>Jaga buku tetap bersih.</li>

</ul>

</div>

</div>

<div class="card shadow mb-3">

<div class="card-header bg-info text-white">

📅 Hari Ini

</div>

<div class="card-body">

<h4>

{{ date('d F Y') }}

</h4>

</div>

</div>

<div class="card shadow">

<div class="card-header bg-dark text-white">

📖 Quote Hari Ini

</div>

<div class="card-body text-center">

<i>

"Membaca adalah jendela dunia."

</i>

</div>

</div>

</div>

</div>

@endsection