<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg border-0">

                <div class="card-header bg-warning">

                    <h3 class="mb-0 text-dark">

                        <i class="fas fa-edit"></i>

                        Edit Buku

                    </h3>

                </div>

                <div class="card-body">

                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ url('/buku/'.$buku->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Kode Buku</label>

                                <input
                                    type="text"
                                    name="kode_buku"
                                    class="form-control"
                                    value="{{ old('kode_buku',$buku->kode_buku) }}"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Judul Buku</label>

                                <input
                                    type="text"
                                    name="judul"
                                    class="form-control"
                                    value="{{ old('judul',$buku->judul) }}"
                                    required>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Kategori</label>

                                <select
                                    name="kategori_id"
                                    class="form-select"
                                    required>

                                    @foreach($kategori as $item)

                                        <option
                                            value="{{ $item->id }}"
                                            {{ old('kategori_id',$buku->kategori_id)==$item->id ? 'selected' : '' }}>

                                            {{ $item->nama }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Pengarang</label>

                                <input
                                    type="text"
                                    name="pengarang"
                                    class="form-control"
                                    value="{{ old('pengarang',$buku->pengarang) }}"
                                    required>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Penerbit</label>

                                <input
                                    type="text"
                                    name="penerbit"
                                    class="form-control"
                                    value="{{ old('penerbit',$buku->penerbit) }}"
                                    required>

                            </div>

                            <div class="col-md-3 mb-3">

                                <label class="form-label">Tahun</label>

                                <input
                                    type="number"
                                    name="tahun_terbit"
                                    class="form-control"
                                    value="{{ old('tahun_terbit',$buku->tahun_terbit) }}"
                                    required>

                            </div>

                            <div class="col-md-3 mb-3">

                                <label class="form-label">Stok</label>

                                <input
                                    type="number"
                                    name="stok"
                                    class="form-control"
                                    value="{{ old('stok',$buku->stok) }}"
                                    min="0"
                                    required>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Ganti Cover (Opsional)

                            </label>

                            <input
                                type="file"
                                name="cover"
                                id="cover"
                                class="form-control"
                                accept="image/*">

                        </div>

                        <div class="text-center mb-4">

                            @if($buku->cover)

                                <img
                                    id="preview"
                                    src="{{ asset('storage/cover/'.$buku->cover) }}"
                                    class="img-thumbnail"
                                    width="180">

                            @else

                                <img
                                    id="preview"
                                    src="https://placehold.co/180x250?text=No+Cover"
                                    class="img-thumbnail">

                            @endif

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ url('/buku') }}" class="btn btn-secondary">

                                <i class="fas fa-arrow-left"></i>

                                Kembali

                            </a>

                            <button class="btn btn-warning">

                                <i class="fas fa-save"></i>

                                Update Buku

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

document.getElementById('cover').addEventListener('change', function(e){

    if(e.target.files.length){

        let reader = new FileReader();

        reader.onload = function(ev){

            document.getElementById('preview').src = ev.target.result;

        }

        reader.readAsDataURL(e.target.files[0]);

    }

});

</script>

</body>
</html>