@extends('layouts.member')

@section('content')

<div class="row">

    <div class="col-md-4">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=198754&color=fff&size=200"
                     class="rounded-circle mb-3">

                <h4>{{ Auth::user()->name }}</h4>

                <span class="badge bg-success">

                    {{ Auth::user()->jenis }}

                </span>

                <hr>

                <p>

                    <i class="fa-solid fa-envelope"></i>

                    {{ Auth::user()->email }}

                </p>

                <p>

                    <i class="fa-solid fa-id-card"></i>

                    {{ Auth::user()->npm }}

                </p>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card shadow border-0">

            <div class="card-header bg-success text-white">

                Edit Profil

            </div>

            <div class="card-body">

                @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

                @endif

                <form action="/profil/update" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label>Nama</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ Auth::user()->name }}">

                    </div>

                    <div class="mb-3">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ Auth::user()->email }}">

                    </div>

                    <button class="btn btn-success">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Perubahan

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection