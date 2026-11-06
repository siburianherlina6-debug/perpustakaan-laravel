<!DOCTYPE html>

<html>

<head>

<title>Pengembalian Buku</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-danger text-white">

<h3>Data Pengembalian</h3>

</div>

<div class="card-body">

<a href="/dashboard"

class="btn btn-secondary mb-3">

Dashboard

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

<th>Status</th>

<th>Aksi</th>

</tr>

@foreach($pinjam as $p)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $p->user->name }}</td>

<td>{{ $p->buku->judul }}</td>

<td>

@if($p->status=="Dipinjam")

<span class="badge bg-warning">

Dipinjam

</span>

@else

<span class="badge bg-success">

Dikembalikan

</span>

@endif

</td>

<td>

@if($p->status=="Dipinjam")

<form action="/pengembalian/{{ $p->id }}" method="POST">

@csrf

<button class="btn btn-success">

Kembalikan

</button>

</form>

@endif

</td>

</tr>

@endforeach

</table>

</div>

</div>

</div>

</body>

</html>