@extends('layouts.app')

@section('content')

<div class="dashboard-header mb-4">

    <h2 class="fw-bold mb-1">
        Dashboard
    </h2>

    <p class="text-muted mb-0">
        Selamat datang kembali di Sistem Informasi Perpustakaan.
    </p>

</div>



<!-- STATISTIK -->

<div class="row g-4">


    <div class="col-lg-3 col-md-6">

        <div class="stat-card">

            <div class="icon-circle bg-blue">
                <i class="fas fa-book"></i>
            </div>

            <h2>
                {{ $totalBuku }}
            </h2>

            <p>Total Buku</p>

        </div>

    </div>



    <div class="col-lg-3 col-md-6">

        <div class="stat-card">

            <div class="icon-circle bg-green">
                <i class="fas fa-users"></i>
            </div>

            <h2>
                {{ $totalMember }}
            </h2>

            <p>Total Member</p>

        </div>

    </div>




    <div class="col-lg-3 col-md-6">

        <div class="stat-card">

            <div class="icon-circle bg-orange">
                <i class="fas fa-book-reader"></i>
            </div>

            <h2>
                {{ $totalPinjam }}
            </h2>

            <p>Sedang Dipinjam</p>

        </div>

    </div>




    <div class="col-lg-3 col-md-6">

        <div class="stat-card">

            <div class="icon-circle bg-purple">
                <i class="fas fa-arrow-rotate-left"></i>
            </div>

            <h2>
                {{ $totalKembali }}
            </h2>

            <p>Sudah Dikembalikan</p>

        </div>

    </div>


</div>




<!-- TRANSAKSI & BUKU -->

<div class="row mt-4">


    <!-- PEMINJAMAN -->

    <div class="col-lg-8">


        <div class="card-dashboard">


            <div class="card-body">


                <div class="d-flex justify-content-between align-items-center mb-4">


                    <h5 class="fw-bold">

                        <i class="fas fa-book-reader me-2"></i>

                        Peminjaman Terbaru

                    </h5>


                    <a href="/peminjaman" 
                       class="btn btn-sm btn-outline-primary">

                        Lihat Semua

                    </a>


                </div>




                <div class="table-responsive">


                    <table class="table table-modern">


                        <thead>

                            <tr>

                                <th>Member</th>
                                <th>Buku</th>
                                <th>Tanggal</th>
                                <th>Status</th>

                            </tr>

                        </thead>



                        <tbody>


                        @forelse($peminjamanTerbaru as $item)


                            <tr>


                                <td>
                                    {{ $item->user->name }}
                                </td>


                                <td>
                                    {{ $item->buku->judul }}
                                </td>


                                <td>
                                    {{ $item->tanggal_pinjam }}
                                </td>


                                <td>


                                @if($item->status == 'Dipinjam')

                                    <span class="badge bg-warning text-dark">
                                        Dipinjam
                                    </span>

                                @else

                                    <span class="badge bg-success">
                                        Dikembalikan
                                    </span>

                                @endif


                                </td>


                            </tr>


                        @empty


                            <tr>

                                <td colspan="4" 
                                    class="text-center">

                                    Belum ada transaksi

                                </td>

                            </tr>


                        @endforelse


                        </tbody>


                    </table>


                </div>


            </div>


        </div>


    </div>





    <!-- BUKU TERBARU -->

    <div class="col-lg-4">


        <div class="card-dashboard">


            <div class="card-body">


                <h5 class="fw-bold mb-4">

                    <i class="fas fa-book me-2"></i>

                    Buku Terbaru

                </h5>




                @forelse($bukuTerbaru as $item)


                <div class="book-item d-flex mb-3">


                    @if($item->cover)


                    <img src="{{ asset('cover/'.$item->cover) }}"
                         width="60"
                         height="80"
                         class="rounded me-3"
                         style="object-fit:cover;">


                    @else


                    <div class="book-placeholder me-3">

                        <i class="fas fa-book"></i>

                    </div>


                    @endif



                    <div>


                        <h6 class="fw-bold mb-1">

                            {{ $item->judul }}

                        </h6>


                        <small>

                            {{ $item->pengarang }}

                        </small>


                    </div>


                </div>



                @empty


                    <p>
                        Belum ada buku
                    </p>


                @endforelse



            </div>


        </div>


    </div>


</div>


@endsection