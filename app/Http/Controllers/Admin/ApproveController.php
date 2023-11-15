<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barang;
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

    public function detail($user_id){
    $peminjams = Peminjam::where('pinjam_status', "1")->first();
    $pinjam_detail = Peminjaman_detail::where('pinjam_id', $peminjams->id)->get();

    return view('admin.history.detail', compact('peminjams', 'pinjam_detail'));
    }

    public function setuju()
    {
        $peminjams = Peminjam::where('pinjam_status', "1")->first();
        $pinjam_details = Peminjaman_detail::where('pinjam_id', $peminjams->id)->get();
        $peminjams->status = "setuju";
        $peminjams->update();

        foreach ($pinjam_details as $pinjam_detail)
        {
            $barang = Barang::where('id', $pinjam_detail->barang_id)->first();
            $barang->jumlah_tersedia = $barang->jumlah_tersedia-$pinjam_detail->jumlah;
            $barang->update();
        }

        return redirect('admin/approve');

    }

    public function tolak($id)
    {
        $peminjams = Peminjam::find($id);
        
        return view('admin.history.tolak', compact('peminjams'));
    }

    public function tolak_update(Request $request, $id)
    {
        $peminjams = Peminjam::find($id);
        $peminjams->pesan = $request->pesan;
        $peminjams->status = "batal";
        $peminjams->save();
        
        return redirect('admin/approve');
    }

    public function kembali($id)
    {
        $peminjams = Peminjam::find($id);
        
        return view('admin.history.kembali', compact('peminjams'));
    }

    public function kembali_update(Request $request, $id)
    {
        $peminjams = Peminjam::find($id);
        $peminjams->pesan = $request->pesan;
        $peminjams->status = "kembali";
        $peminjams->save();

        $pinjam_details = Peminjaman_detail::where('pinjam_id', $peminjams->id)->get();
        foreach ($pinjam_details as $pinjam_detail)
        {
            $barang = Barang::where('id', $pinjam_detail->barang_id)->first();
            $barang->jumlah_tersedia = $barang->jumlah_tersedia+$pinjam_detail->jumlah;
            $barang->update();
        }

        return redirect('admin/approve');
    }

    public function denda($id)
    {
        $peminjaman = Peminjam::find($id);
        
        return view('admin.history.denda', compact('peminjaman'));
    }

    public function denda_update(Request $request, $id)
    {
        $peminjaman = Peminjam::find($id);
        $peminjaman->pesan = $request->pesan;
        $peminjaman->status = "denda";
        $peminjaman->save();

        return redirect('admin/approve');
    }

    public function kembali_denda($id)
    {
        $peminjams = Peminjam::find($id);
        
        return view('admin.history.kembalidenda', compact('peminjams'));
    }

    public function kembali_denda_update(Request $request, $id)
    {
        $peminjams = Peminjam::find($id);
        $peminjams->pesan = $request->pesan;
        $peminjams->status = "kembali";
        $peminjams->save();

        $pinjam_details = Peminjaman_detail::where('pinjam_id', $peminjams->id)->get();
        foreach ($pinjam_details as $pinjam_detail)
        {
            $barang = Barang::where('id', $pinjam_detail->barang_id)->first();
            $barang->jumlah_tersedia = $barang->jumlah_tersedia+$pinjam_detail->jumlah;
            $barang->update();
        }

        return redirect('admin/approve');
    }

    // public function lunas($id)
    // {
    //     $peminjams = Peminjam::find($id);
        
    //     return view('admin.history.kembali', compact('peminjams'));
    // }

    // public function lunas_update(Request $request, $id)
    // {
    //     $peminjams = Peminjam::find($id);
    //     $peminjams->pesan = $request->pesan;
    //     $peminjams->status = "kembali";
    //     $peminjams->save();

    //     $pinjam_details = Peminjaman_detail::where('pinjam_id', $peminjams->id)->get();
    //     foreach ($pinjam_details as $pinjam_detail)
    //     {
    //         $barang = Barang::where('id', $pinjam_detail->barang_id)->first();
    //         $barang->jumlah_tersedia = $barang->jumlah_tersedia+$pinjam_detail->jumlah;
    //         $barang->update();
    //     }

    //     return redirect('admin/approve');
    // }

    



}

