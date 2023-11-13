<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Peminjam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman_detail;

class HistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $peminjams = Peminjam::where('user_id', $user->id)->where('pinjam_status', '>', 1)->get();
    
        return view('mahasiswa.history.index', compact('peminjams'));
    }

    public function detail(){
        $peminjams = Peminjam::where('user_id', Auth::user()->id)->where('pinjam_status',"1")->first();
        $pinjam_detail = Peminjaman_detail::where('pinjam_id', $peminjams->id)->get();

        return view('mahasiswa.history.detail', compact('peminjams', 'pinjam_detail'));
    }

}
