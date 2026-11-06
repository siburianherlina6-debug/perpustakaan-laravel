@extends('layouts.member')

@section('content')

<h2 class="mb-4">
    💰 Denda Saya
</h2>

<div class="card shadow">

    <div class="card-header bg-danger text-white">

        Daftar Denda

    </div>

    <div class="card-body">

        @php

        $total = 0;

        @endphp

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>No</th>

                    <th>Judul Buku</th>

                    <th>Tanggal Pinjam</th>

                    <th>Jatuh Tempo</th>

                    <th>Status</th>

                    <th>Denda</th>

                </tr>

            </thead>

            <tbody>

                @forelse($denda as $item)

                @php

                $total += $item->denda;

                @endphp

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->buku->judul }}</td>

                    <td>{{ $item->tanggal_pinjam }}</td>

                    <td>{{ $item->tanggal_kembali }}</td>

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

                @empty

                <tr>

                    <td colspan="6" class="text-center">

                        🎉 Tidak ada denda.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        <div class="alert alert-danger">

            <h4>

                Total Denda :

                Rp {{ number_format($total,0,',','.') }}

            </h4>

        </div>

    </div>

</div>

@endsection