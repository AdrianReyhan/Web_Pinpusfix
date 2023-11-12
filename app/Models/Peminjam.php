<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tgl_pesan',
        'tgl_pinjam',
        'tgl_kembali',
        'jumlah_total',
        'pesan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
