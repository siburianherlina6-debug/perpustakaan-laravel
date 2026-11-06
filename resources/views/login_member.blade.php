<!DOCTYPE html>
<html>
<head>

<title>Login Member</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-success">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header text-center">

<h3>LOGIN MEMBER</h3>

</div>

<div class="card-body">

@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif

<form action="/login" method="POST">

@csrf

<input type="email" name="email" class="form-control mb-3" placeholder="Email">

<input type="password" name="password" class="form-control mb-3" placeholder="Password">

<button class="btn btn-success w-100">

LOGIN

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