<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Laporan Peminjaman</title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        h2{
            text-align:center;
            margin-bottom:5px;
        }

        h4{
            text-align:center;
            margin-top:0;
            margin-bottom:25px;
            color:#555;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:8px;
            text-align:left;
        }

        table th{
            background:#f0f0f0;
        }

        .footer{
            margin-top:30px;
            text-align:right;
        }

    </style>

</head>

<body>

<h2>PERPUSTAKAAN DIGITAL</h2>

<h4>LAPORAN DATA PEMINJAMAN BUKU</h4>

<table>

    <thead>

    <tr>

        <th>No</th>
        <th>Member</th>
        <th>Buku</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Kembali</th>
        <th>Status</th>

    </tr>

    </thead>

    <tbody>

    @foreach($peminjaman as $item)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $item->user->name }}</td>

        <td>{{ $item->buku->judul }}</td>

        <td>{{ $item->tanggal_pinjam }}</td>

        <td>{{ $item->tanggal_kembali }}</td>

        <td>{{ $item->status }}</td>

    </tr>

    @endforeach

    </tbody>

</table>

<div class="footer">

    Dicetak :
    {{ date('d-m-Y H:i') }}

</div>

</body>

</html>