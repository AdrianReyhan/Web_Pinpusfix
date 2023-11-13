<?php

namespace App\Http\Controllers\Admin;

use App\Models\Peminjam;
use Illuminate\Http\Request;
use App\Models\Peminjaman_detail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApproveController extends Controller
{
    public function index()
    {
        $peminjams = Peminjam::where('pinjam_status', '>', 1)->get();
    
        return view('admin.history.index', compact('peminjams'));
    }

    public function detail($id){
        $peminjams = Peminjam::where('user_id', $id)->where('pinjam_status',"1")->first();
        $pinjam_detail = Peminjaman_detail::where('pinjam_id', $peminjams->id)->get();

        return view('admin.history.detail', compact('peminjams', 'pinjam_detail'));
    }
}
