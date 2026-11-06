@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="fas fa-file-alt"></i>
                Laporan Peminjaman
            </h4>

            <div>

                <a href="{{ url('/laporan/cetak') }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i>
                    Cetak PDF
                </a>

                <a href="{{ url('/dashboard') }}" class="btn btn-light">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>

            </div>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark text-center">

                    <tr>

                        <th width="60">No</th>
                        <th>Member</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Denda</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($peminjaman as $item)

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->user->name }}
                            </td>

                            <td>
                                {{ $item->buku->judul }}
                            </td>

                            <td>
                                {{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}
                            </td>

                            <td>
                                {{ date('d-m-Y', strtotime($item->tanggal_kembali)) }}
                            </td>

                            <td class="text-center">

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

                            <td class="text-end">

                                Rp {{ number_format($item->denda,0,',','.') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center text-muted">

                                Belum ada data peminjaman.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection