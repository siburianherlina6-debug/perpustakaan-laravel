<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    overflow:hidden;

    background:
    radial-gradient(circle at top left,#60a5fa 0,#2563eb 30%,transparent 55%),
    radial-gradient(circle at bottom right,#a855f7 0,#7c3aed 30%,transparent 55%),
    linear-gradient(135deg,#1e3a8a,#3730a3,#4c1d95);

}

.bg-circle{

    position:absolute;
    border-radius:50%;
    filter:blur(120px);
    opacity:.25;

}

.c1{

    width:350px;
    height:350px;
    background:#38bdf8;
    top:-100px;
    left:-100px;

}

.c2{

    width:300px;
    height:300px;
    background:#ec4899;
    right:-80px;
    bottom:-80px;

}

.main-card{

    width:1100px;
    max-width:95%;

    border:none;

    border-radius:30px;

    overflow:hidden;

    background:rgba(255,255,255,.12);

    backdrop-filter:blur(25px);

    box-shadow:0 25px 60px rgba(0,0,0,.25);

}

.left-side{

    background:white;

    padding:60px;

}

.right-side{

    background:linear-gradient(160deg,#2563eb,#4338ca);

    color:white;

    padding:60px;

    display:flex;

    flex-direction:column;

    justify-content:center;

    align-items:center;

}

.logo{

    width:100px;

    height:100px;

    border-radius:50%;

    background:#2563eb;

    color:white;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:50px;

    margin:auto;

    box-shadow:0 10px 25px rgba(37,99,235,.3);

}

.title{

    font-size:38px;

    font-weight:700;

    color:#1e293b;

}

.subtitle{

    color:#64748b;

    font-size:16px;

}

.btn-custom{

    width:100%;

    border-radius:50px;

    padding:13px;

    font-weight:600;

    transition:.3s;

}

.btn-custom:hover{

    transform:translateY(-3px);

}

.info-card{

    background:#f8fafc;

    border-radius:18px;

    padding:18px;

    margin-top:30px;

}

.info-card i{

    font-size:30px;

    color:#2563eb;

}

.stat{

    display:flex;

    gap:15px;

    margin-top:35px;

}

.stat-box{

    flex:1;

    background:rgba(255,255,255,.18);

    border-radius:15px;

    padding:18px;

    text-align:center;

}

.stat-box h3{

    font-size:28px;

    font-weight:700;

}

@media(max-width:992px){

.right-side{

display:none;

}

.left-side{

padding:35px;

}

.main-card{

width:95%;

}

}

</style>

</head>
<body>

<div class="bg-circle c1"></div>
<div class="bg-circle c2"></div>

<div class="card main-card">

    <div class="row g-0">

        <!-- KIRI -->
        <div class="col-lg-7">

            <div class="left-side">

                <div class="logo">
                    <i class="bi bi-book-half"></i>
                </div>

                <div class="text-center mt-4">

                    <span class="badge bg-primary px-4 py-2 rounded-pill">
                        📚 Selamat Datang
                    </span>

                    <h1 class="title mt-3">
                        Sistem Informasi
                        <br>
                        Perpustakaan
                    </h1>

                    <p class="subtitle mt-3">
                        Kelola data buku, anggota, peminjaman,
                        pengembalian dan laporan dalam satu aplikasi
                        yang cepat, aman dan modern.
                    </p>

                </div>

                <div class="row mt-5">

                    <div class="col-6">

                        <a href="/login/admin"
                           class="btn btn-primary btn-custom">

                            <i class="bi bi-person-fill-lock"></i>

                            Login Admin

                        </a>

                    </div>

                    <div class="col-6">

                        <a href="/login/member"
                           class="btn btn-success btn-custom">

                            <i class="bi bi-person"></i>

                            Login Member

                        </a>

                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-6">

                        <a href="/register/admin"
                           class="btn btn-outline-primary btn-custom">

                            Daftar Admin

                        </a>

                    </div>

                    <div class="col-6">

                        <a href="/register/member"
                           class="btn btn-outline-success btn-custom">

                            Daftar Member

                        </a>

                    </div>

                </div>

                <div class="info-card">

                    <div class="row">

                        <div class="col-2 text-center">

                            <i class="bi bi-lightbulb-fill"></i>

                        </div>

                        <div class="col-10">

                            <h5 class="fw-bold">

                                Mudah Digunakan

                            </h5>

                            <p class="text-secondary mb-0">

                                Kelola koleksi buku, data anggota,
                                peminjaman, pengembalian, dan laporan
                                dengan tampilan yang sederhana dan modern.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>
                <!-- KANAN -->
        <div class="col-lg-5">

            <div class="right-side">

                <i class="bi bi-book-half"
                   style="font-size:100px;"></i>

                <h2 class="fw-bold mt-4">

                    Perpustakaan Digital

                </h2>

                <p class="text-center mt-3">

                    Belajar menjadi lebih mudah dengan
                    sistem perpustakaan yang modern,
                    cepat, aman dan efisien.

                </p>

                <div class="stat">

                    <div class="stat-box">

                        <h3>1500+</h3>

                        <small>Koleksi Buku</small>

                    </div>

                    <div class="stat-box">

                        <h3>650+</h3>

                        <small>Anggota</small>

                    </div>

                    <div class="stat-box">

                        <h3>300+</h3>

                        <small>Peminjaman</small>

                    </div>

                </div>

                <div class="mt-5 w-100">

                    <div class="bg-white rounded-4 p-4 text-dark">

                        <h5 class="fw-bold">

                            Kenapa memilih aplikasi ini?

                        </h5>

                        <hr>

                        <p class="mb-2">

                            ✅ Manajemen Buku

                        </p>

                        <p class="mb-2">

                            ✅ Data Anggota

                        </p>

                        <p class="mb-2">

                            ✅ Peminjaman Buku

                        </p>

                        <p class="mb-2">

                            ✅ Pengembalian Buku

                        </p>

                        <p class="mb-0">

                            ✅ Laporan Otomatis

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<footer
style="
position:absolute;
bottom:15px;
left:0;
right:0;
text-align:center;
color:white;
font-size:14px;
">



</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>