<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:#f4efe6;
}


/* SIDEBAR */

.sidebar{

    position:fixed;
    width:260px;
    height:100vh;
    background:#2f3e46;
    overflow:auto;

}


.logo{

    padding:28px;
    font-size:24px;
    font-weight:700;
    color:#f4d58d;
    border-bottom:1px solid rgba(255,255,255,.1);

}


.logo i{

    margin-right:10px;

}


.menu{

    margin-top:20px;

}


.menu-title{

    font-size:12px;
    color:#cbd5e1;
    padding:0 25px;
    margin-bottom:10px;
    text-transform:uppercase;

}



.menu a{

    display:flex;
    align-items:center;
    text-decoration:none;
    color:#e2e8f0;
    padding:14px 25px;
    transition:.3s;
    font-size:15px;

}


.menu a i{

    width:30px;
    font-size:18px;

}


.menu a:hover{

    background:#465a64;
    color:#f4d58d;

}


.menu a.active{

    background:#c59d5f;
    color:white;
    border-radius:12px;
    margin:0 12px;

}




/* CONTENT */

.content{

    margin-left:260px;
    min-height:100vh;

}


.topbar{

    background:#fffaf0;
    height:80px;
    padding:0 35px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 4px 15px rgba(0,0,0,.08);

}



.topbar h4{

    margin:0;
    font-weight:700;
    color:#2f3e46;

}



.topbar small{

    color:#777;

}



.admin-avatar{

    width:45px;
    height:45px;
    border-radius:50%;
    background:#c59d5f;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;

}




.page{

    padding:30px;

}



/* CARD DASHBOARD */

.card-dashboard{

    border:none;
    border-radius:22px;
    background:#fffaf0;
    box-shadow:0 10px 30px rgba(0,0,0,.08);

}



.card-dashboard .card-body{

    padding:28px;

}



/* STAT CARD */

.stat-card{

    background:#fffaf0;
    border-radius:20px;
    padding:25px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.3s;
    height:100%;
    border-left:5px solid #c59d5f;

}



.stat-card:hover{

    transform:translateY(-8px);

}



.icon-circle{

    width:60px;
    height:60px;
    border-radius:18px;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:24px;
    margin-bottom:18px;
    color:white;

}



.bg-blue{

    background:#34495e;

}


.bg-green{

    background:#27ae60;

}


.bg-orange{

    background:#e67e22;

}


.bg-red{

    background:#8e44ad;

}



.stat-card h2{

    font-size:34px;
    font-weight:700;
    color:#2f3e46;

}



.stat-card p{

    color:#777;

}




/* TABLE */

.table-modern th{

    background:#eee2c6;
    color:#6b4f2a;
    border:none;

}



.table-modern td{

    border:none;
    padding:15px;

}



.table-modern tbody tr{

    background:#faf5e9;

}



.table-modern tbody tr:hover{

    background:#f0dfbd;

}



/* BUTTON */

.btn-outline-primary{

    border-color:#c59d5f;
    color:#9a7635;
    border-radius:20px;

}


.btn-outline-primary:hover{

    background:#c59d5f;
    color:white;

}



/* BUKU */

.book-item{

    padding:10px;
    border-radius:15px;
    transition:.3s;

}


.book-item:hover{

    background:#f0dfbd;

}


.book-placeholder{

    width:60px;
    height:80px;
    background:#eadbbd;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:10px;
    color:#9a7635;

}
</style>

</head>

<body>

<div class="sidebar">

    <div class="logo">

        <i class="fas fa-book-open"></i>

        Library

    </div>

    <div class="menu">

        <div class="menu-title">

            Menu Utama

        </div>

        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">

            <i class="fas fa-house"></i>

            Dashboard

        </a>

        <a href="/buku" class="{{ request()->is('buku*') ? 'active' : '' }}">

            <i class="fas fa-book"></i>

            Data Buku

        </a>

        <a href="/kategori" class="{{ request()->is('kategori*') ? 'active' : '' }}">

            <i class="fas fa-tags"></i>

            Kategori

        </a>

        <a href="/anggota" class="{{ request()->is('anggota*') ? 'active' : '' }}">

            <i class="fas fa-users"></i>

            Anggota

        </a>

        <a href="/peminjaman" class="{{ request()->is('peminjaman*') ? 'active' : '' }}">

            <i class="fas fa-book-reader"></i>

            Peminjaman

        </a>

        <a href="/pengembalian" class="{{ request()->is('pengembalian*') ? 'active' : '' }}">

            <i class="fas fa-arrow-rotate-left"></i>

            Pengembalian

        </a>

        <a href="/laporan" class="{{ request()->is('laporan*') ? 'active' : '' }}">

            <i class="fas fa-file-lines"></i>

            Laporan

        </a>

    </div>

    <div class="menu mt-4">

        <div class="menu-title">

            Akun

        </div>

        <a href="/logout">

            <i class="fas fa-right-from-bracket"></i>

            Logout

        </a>

    </div>

</div>

<div class="content">

    <div class="topbar">

        <div>

            <h4>

                Dashboard Admin

            </h4>

            <small>

                Sistem Informasi Perpustakaan

            </small>

        </div>

        <div class="admin-box">

            <div class="text-end">

                <strong>

                    {{ Auth::user()->name }}

                </strong>

                <br>

                <small class="text-muted">

                    Administrator

                </small>

            </div>

            <div class="admin-avatar">

                <i class="fas fa-user"></i>

            </div>

        </div>

    </div>

    <div class="page">

        @yield('content')

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>