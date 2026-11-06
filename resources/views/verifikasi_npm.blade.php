<!DOCTYPE html>

<html>

<head>

<title>Verifikasi NPM</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-success">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header text-center">

<h3>

VERIFIKASI NPM

</h3>

</div>

<div class="card-body">

@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif

<form action="/verifikasi-npm" method="POST">

@csrf

<label>

Masukkan NPM Anda

</label>

<input

type="password"

name="npm"

class="form-control mb-3"

placeholder="Masukkan NPM"

required

>

<button class="btn btn-success w-100">

VERIFIKASI

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>