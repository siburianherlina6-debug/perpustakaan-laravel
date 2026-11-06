<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-4">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h3 class="mb-0">
                <i class="fas fa-book"></i>
                Data Buku
            </h3>

            <div>
                <a href="/dashboard" class="btn btn-light btn-sm">
                    <i class="fas fa-home"></i> Dashboard
                </a>

                <a href="/buku/create" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah Buku
                </a>
            </div>

        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- SEARCH & FILTER --}}
            <form action="{{ url('/buku') }}" method="GET" class="row g-2 mb-4">

                <div class="col-md-5">
                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Cari judul, kode, pengarang..."
                           value="{{ request('search') }}">
                </div>

                <div class="col-md-4">
                    <select name="kategori" class="form-select">

                        <option value="">Semua Kategori</option>

                        @foreach($kategori as $k)

                            <option value="{{ $k->id }}"
                                {{ request('kategori')==$k->id ? 'selected' : '' }}>
                                {{ $k->nama }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="col-md-3 d-grid">

                    <button class="btn btn-primary">

                        <i class="fas fa-search"></i>

                        Cari

                    </button>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle">

                    <thead class="table-dark text-center">

                    <tr>

                        <th>No</th>
                        <th>Cover</th>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th width="150">Aksi</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($buku as $item)

                        <tr>

                            <td class="text-center">
                                {{ ($buku->currentPage()-1) * $buku->perPage() + $loop->iteration }}
                            </td>

                            <td class="text-center">

                                @if($item->cover)

                                    <img src="{{ asset('cover/'.$item->cover) }}"
                                         width="70"
                                         class="img-thumbnail">

                                @else

                                    <span class="badge bg-secondary">
                                        No Cover
                                    </span>

                                @endif

                            </td>

                            <td>{{ $item->kode_buku }}</td>

                            <td>{{ $item->judul }}</td>

                            <td>

                                @if($item->kategori)

                                    <span class="badge bg-primary">

                                        {{ $item->kategori->nama }}

                                    </span>

                                @else

                                    <span class="badge bg-secondary">

                                        -

                                    </span>

                                @endif

                            </td>

                            <td>{{ $item->pengarang }}</td>

                            <td>{{ $item->penerbit }}</td>

                            <td class="text-center">

                                {{ $item->tahun_terbit }}

                            </td>

                            <td class="text-center">

                                @if($item->stok>0)

                                    <span class="badge bg-success">

                                        {{ $item->stok }}

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Habis

                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="/buku/{{ $item->id }}/edit"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="/buku/{{ $item->id }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus buku ini?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="10" class="text-center text-muted">

                                Belum ada data buku.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $buku->withQueryString()->links() }}

            </div>

        </div>

    </div>

</div>

</body>
</html>