<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PinjamController extends Controller
{
    public function index()
    {
        $barangs = Barang::where('jumlah_tersedia', '>', 0)->get();
    
        return view('mahasiswa.barang.index', ['barangs' => $barangs]);
    }
}
