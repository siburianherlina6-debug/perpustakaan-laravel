<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\User;

class Peminjaman extends Model
{
    // Nama tabel di database
    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'denda'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}