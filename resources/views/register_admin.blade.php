<!DOCTYPE html>
<html>
<head>

<title>Register Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-primary">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header text-center">

<h3>DAFTAR ADMIN</h3>

</div>

<div class="card-body">

<form action="/register/admin" method="POST">

@csrf

<input type="text" name="name" class="form-control mb-3" placeholder="Nama Lengkap" required>

<input type="text" name="npm" class="form-control mb-3" placeholder="NPM" required>

<input type="text" name="alamat" class="form-control mb-3" placeholder="Alamat" required>

<input type="text" name="telepon" class="form-control mb-3" placeholder="No Telepon" required>

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button class="btn btn-primary w-100">

DAFTAR ADMIN

</button>

</form>

<br>

<a href="/" class="btn btn-secondary w-100">

Kembali

</a>

</div>

</div>

</div>

</div>

</div>

</body>

</html>