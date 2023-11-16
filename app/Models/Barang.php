<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'jumlah_tersedia',
        'jumlah_rusak',
        'jumlah_hilang',
        'foto',
    ];

    public function pinjam_detail()
    {
        return $this->hasMany(Peminjaman_detail::class, 'barang_id');
    }
}
