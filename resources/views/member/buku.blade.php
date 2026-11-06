@extends('layouts.member')

@section('content')

<div class="row mb-4">

    <div class="col-md-8">

        <h2>
            📚 Daftar Buku Perpustakaan
        </h2>

        <p class="text-muted">
            Cari dan pinjam buku yang tersedia.
        </p>

    </div>

    <div class="col-md-4">

        <form action="/member/buku" method="GET">

            <div class="input-group">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari judul buku..."
                    value="{{ request('search') }}">

                <button class="btn btn-success">

                    <i class="fa fa-search"></i>

                </button>

            </div>

        </form>

    </div>

</div>

<div class="row mb-4">

    <div class="col-md-12">

        <div class="alert alert-primary shadow-sm">

            📚 Total Buku :

            <b>{{ $buku->count() }}</b>

            &nbsp;&nbsp;&nbsp;

            👤 Member :

            <b>{{ Auth::user()->name }}</b>

        </div>

    </div>

</div>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif

<div class="row">

@foreach($buku as $item)

<div class="col-lg-3 col-md-4 col-sm-6 mb-4">

<div class="card shadow border-0 h-100">

@if($item->cover)

<img src="{{ asset('cover/'.$item->cover) }}"
class="card-img-top"
style="height:300px;object-fit:cover;">

@else

<img src="https://via.placeholder.com/250x300?text=No+Cover"
class="card-img-top">

@endif

<div class="card-body">

<h5 class="fw-bold">

{{ $item->judul }}

</h5>

<p class="text-muted mb-1">

<i class="fa fa-user"></i>

{{ $item->pengarang }}

</p>

<p class="mb-1">

<i class="fa fa-calendar"></i>

{{ $item->tahun_terbit }}

</p>

<p class="mb-2">

<i class="fa fa-box"></i>

Stok :

<b>{{ $item->stok }}</b>

</p>

@if($item->stok>0)

<span class="badge bg-success">

Tersedia

</span>

@else

<span class="badge bg-danger">

Stok Habis

</span>

@endif

<br><br>
<div class="mb-2">

<i class="fa-solid fa-star text-warning"></i>
<i class="fa-solid fa-star text-warning"></i>
<i class="fa-solid fa-star text-warning"></i>
<i class="fa-solid fa-star text-warning"></i>
<i class="fa-regular fa-star text-warning"></i>

<small class="text-muted">

(4.0)

</small>

</div>

<div class="d-grid gap-2">

<a href="/member/detail/{{ $item->id }}"
class="btn btn-primary">

<i class="fa-solid fa-circle-info"></i>

Detail Buku

</a>

@if($item->stok>0)

<form action="/member/pinjam/{{ $item->id }}" method="POST">

@csrf

<button class="btn btn-success w-100">

<i class="fa-solid fa-book"></i>

Pinjam Buku

</button>

</form>

@else

<button class="btn btn-danger w-100" disabled>

<i class="fa-solid fa-ban"></i>

Stok Habis

</button>

@endif

<button class="btn btn-outline-danger">

<i class="fa-solid fa-heart"></i>

Favorit

</button>

</div>

</div>

</div>

</div>

@endforeach

</div>

<div class="mt-4 d-flex justify-content-center">

{{ $buku->links() }}

</div>

<style>

.card{

border-radius:18px;

transition:.3s;

overflow:hidden;

}

.card:hover{

transform:translateY(-8px);

box-shadow:0 15px 30px rgba(0,0,0,.25);

}

.card-img-top{

transition:.4s;

}

.card:hover .card-img-top{

transform:scale(1.05);

}

.badge{

font-size:14px;

}

.btn{

border-radius:10px;

}

</style>

@endsection