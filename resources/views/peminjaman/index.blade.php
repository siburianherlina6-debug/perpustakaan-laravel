<!DOCTYPE html>

<html>

<head>

<title>Peminjaman</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Data Peminjaman</h3>

</div>

<div class="card-body">

<a href="/dashboard"

class="btn btn-secondary mb-3">

Dashboard

</a>

<a href="/peminjaman/create"

class="btn btn-primary mb-3">

Tambah Peminjaman

</a>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<table class="table table-bordered">

<tr>

<th>No</th>

<th>Member</th>

<th>Buku</th>

<th>Tanggal Pinjam</th>

<th>Tanggal Kembali</th>

<th>Status</th>

</tr>

@foreach($pinjam as $p)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $p->user->name }}</td>

<td>{{ $p->buku->judul }}</td>

<td>{{ $p->tanggal_pinjam }}</td>

<td>{{ $p->tanggal_kembali }}</td>

<td>

<span class="badge bg-warning">

{{ $p->status }}

</span>

</td>

</tr>

@endforeach

</table>

</div>

</div>

</div>

</body>

</html>