<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Tambah Kategori</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-success text-white">

                    <h4>Tambah Kategori</h4>

                </div>

                <div class="card-body">

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('kategori.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">

                                Nama Kategori

                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Masukkan nama kategori"
                                required>

                        </div>

                        <button class="btn btn-success">

                            Simpan

                        </button>

                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>