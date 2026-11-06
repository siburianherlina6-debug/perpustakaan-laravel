<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    public function reservasi()
{
    $reservasi = Reservasi::with('buku')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('member.reservasi', compact('reservasi'));
}
}
