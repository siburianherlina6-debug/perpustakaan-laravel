<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#edf2f7;
            font-family:Segoe UI,Tahoma,Geneva,Verdana,sans-serif;
        }

        .sidebar{

            position:fixed;

            left:0;

            top:0;

            width:260px;

            height:100vh;

            background:#198754;

            color:white;

            overflow:auto;

        }

        .logo{

            padding:25px;

            font-size:30px;

            font-weight:bold;

            text-align:center;

            border-bottom:1px solid rgba(255,255,255,.2);

        }

        .sidebar a{

            color:white;

            text-decoration:none;

            display:block;

            padding:16px 25px;

            font-size:18px;

            transition:.3s;

        }

        .sidebar a:hover{

            background:white;

            color:#198754;

            padding-left:35px;

        }

        .content{

            margin-left:260px;

            padding:25px;

        }

        .navbar-custom{

            background:white;

            border-radius:15px;

            padding:18px;

            margin-bottom:25px;

            box-shadow:0 3px 15px rgba(0,0,0,.1);

            display:flex;

            justify-content:space-between;

            align-items:center;

        }

        .card-box{

            color:white;

            border-radius:15px;

            padding:25px;

            margin-bottom:20px;

            box-shadow:0 5px 15px rgba(0,0,0,.15);

            transition:.3s;

        }

        .card-box:hover{

            transform:translateY(-5px);

        }

        .card-box h2{

            font-size:40px;

            font-weight:bold;

        }

        .card-box h5{

            margin-top:10px;

        }

        .bg-blue{

            background:#0d6efd;

        }

        .bg-green{

            background:#198754;

        }

        .bg-orange{

            background:#fd7e14;

        }

        .bg-red{

            background:#dc3545;

        }

        .bg-purple{

            background:#6f42c1;

        }

        .bg-info2{

            background:#0dcaf0;

        }

        .table img{

            border-radius:8px;

        }

        .footer{

            margin-top:40px;

            text-align:center;

            color:gray;

        }

    </style>

</head>

<body>
    <!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">

        📚 PERPUSTAKAAN

    </div>

    <a href="/member">

        <i class="fa-solid fa-house"></i>

        Dashboard

    </a>

    <a href="/member/buku">

        <i class="fa-solid fa-book"></i>

        Daftar Buku

    </a>

    <a href="/riwayat">

        <i class="fa-solid fa-clock-rotate-left"></i>

        Riwayat Pinjaman

    </a>

    <a href="/reservasi">

        <i class="fa-solid fa-bookmark"></i>

        Reservasi Buku

    </a>

    <a href="/denda">

        <i class="fa-solid fa-money-bill-wave"></i>

        Denda Saya

    </a>

    <a href="/profil">

        <i class="fa-solid fa-user"></i>

        Profil

    </a>

    <hr class="text-light">

    <a href="/logout">

        <i class="fa-solid fa-right-from-bracket"></i>

        Logout

    </a>

</div>

<!-- CONTENT -->

<div class="content">

    <!-- NAVBAR -->

    <div class="navbar-custom">

        <div>

            <h3>

                👋 Selamat Datang,

                <b>{{ Auth::user()->name }}</b>

            </h3>

            <small class="text-muted">

                Sistem Informasi Perpustakaan Digital

            </small>

        </div>

        <div class="text-end">

            <h5 id="jam"></h5>

            <small>

                {{ date('d F Y') }}

            </small>

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

    @yield('content')

    <div class="footer">

        <hr>

        <strong>

            Perpustakaan Digital Universitas

        </strong>

        <br>

        © {{ date('Y') }} | Dibuat dengan Laravel 12

    </div>

</div>

<script>

setInterval(function(){

    document.getElementById("jam").innerHTML = new Date().toLocaleTimeString();

},1000);

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>