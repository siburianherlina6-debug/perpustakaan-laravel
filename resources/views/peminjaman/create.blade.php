<!DOCTYPE html>

<html>

<head>

<title>Tambah Peminjaman</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

Tambah Peminjaman

</div>

<div class="card-body">

@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif

<form action="/peminjaman" method="POST">

@csrf

<label>Member</label>

<select name="user_id" class="form-control mb-3">

@foreach($anggota as $a)

<option value="{{ $a->id }}">

{{ $a->name }}

</option>

@endforeach

</select>

<label>Buku</label>

<select name="buku_id" class="form-control mb-3">

@foreach($buku as $b)

<option value="{{ $b->id }}">

{{ $b->judul }}

(Stok {{ $b->stok }})

</option>

@endforeach

</select>

<label>Tanggal Pinjam</label>

<input

type="date"

name="tanggal_pinjam"

class="form-control mb-3">

<label>Tanggal Kembali</label>

<input

type="date"

name="tanggal_kembali"

class="form-control mb-3">

<button class="btn btn-primary">

Simpan

</button>

<a href="/peminjaman"

class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</body>

</html>