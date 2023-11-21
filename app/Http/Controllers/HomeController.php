<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjam;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barang = Barang::count();
        $mahasiswa = User::where('role', 'mahasiswa')->count();
        $pegawai = User::where('role', 'admin')->count();
        $peminjam = Peminjam::count();
        $user = Auth::user();
        $peminjamuser = Peminjam::where('user_id', $user->id)->where('pinjam_status', '>', 1)->count();
        if(Auth::user()->role== 'admin') { 
            return view('Adminhome',compact('barang','mahasiswa','pegawai','peminjam'));
            }
            else{
            return view('Mahasiswahome',compact('barang','peminjamuser'));
            }
    }

    
}
