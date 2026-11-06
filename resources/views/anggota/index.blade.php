<!DOCTYPE html>
<html>
<head>

<title>Data Anggota</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>👨‍🎓 Data Anggota</h3>

</div>

<div class="card-body">

<a href="/dashboard" class="btn btn-secondary mb-3">

Dashboard

</a>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>No</th>

<th>Nama</th>

<th>NPM</th>

<th>Email</th>

<th>Telepon</th>

<th>Alamat</th>

</tr>

</thead>

<tbody>

@foreach($anggota as $a)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $a->name }}</td>

<td>{{ $a->npm }}</td>

<td>{{ $a->email }}</td>

<td>{{ $a->telepon }}</td>

<td>{{ $a->alamat }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>