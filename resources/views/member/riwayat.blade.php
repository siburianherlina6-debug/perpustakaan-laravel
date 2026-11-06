@extends('layouts.member')

@section('content')

<h2 class="mb-4">

📖 Riwayat Peminjaman

</h2>

<div class="card shadow">

<div class="card-header bg-success text-white">

Riwayat Buku yang Pernah Dipinjam

</div>

<div class="card-body">

@if($riwayat->count()==0)

<div class="alert alert-warning">

Belum ada riwayat peminjaman.

</div>

@else

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>No</th>

<th>Cover</th>

<th>Judul</th>

<th>Tanggal Pinjam</th>

<th>Tanggal Kembali</th>

<th>Status</th>

<th>Denda</th>

</tr>

</thead>

<tbody>

@foreach($riwayat as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>

@if($item->buku->cover)

<img src="{{ asset('cover/'.$item->buku->cover) }}" width="70">

@endif

</td>

<td>

{{ $item->buku->judul }}

</td>

<td>

{{ $item->tanggal_pinjam }}

</td>

<td>

{{ $item->tanggal_kembali }}

</td>

<td>

@if($item->status=="Dipinjam")

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

Rp {{ number_format($item->denda,0,',','.') }}

</td>

</tr>

@endforeach

</tbody>

</table>

@endif

</div>

</div>

@endsection