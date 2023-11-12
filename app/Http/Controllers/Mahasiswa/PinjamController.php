<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peminjam;
use App\Models\Peminjaman_detail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PinjamController extends Controller
{
    public function index()
    {
        $barangs = Barang::where('jumlah_tersedia', '>', 0)->get();
    
        return view('mahasiswa.barang.index', ['barangs' => $barangs]);
    }

    public function pinjam(Request $request, $id){
        $barangs = Barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        if($request->jumlah > $barangs->jumlah_tersedia)
        {
            return redirect(route('pinjam.index'))->with('error', 'jumlah barang terlalu banyak');
        }
        //cek validasi
        $cek_pesanan = Peminjam::where('user_id', Auth::user()->id)->where('pinjam_status',"0")->first();

        if(empty($cek_pesanan))
        {
            $pinjams = new Peminjam();
            $pinjams->user_id = Auth::user()->id;
            $pinjams->tgl_pesan = $tanggal;
            $pinjams->tgl_pinjam = $tanggal;
            $pinjams->tgl_kembali = $tanggal;
            $pinjams->jumlah_total = "0";
            $pinjams->pesan = "-";
            $pinjams->pinjam_status = "0";
            $pinjams->save();
        }
        

        $pinjam_baru = Peminjam::where('user_id', Auth::user()->id)->where('pinjam_status',"0")->first();
        
        $cek_pinjam_detail = Peminjaman_detail::where('barang_id', $barangs->id)->where('pinjam_id', $pinjam_baru->id)->first();
        if(empty($cek_pinjam_detail)){
            $pinjam_detail = new Peminjaman_detail();
            $pinjam_detail->barang_id = $barangs->id;
            $pinjam_detail->pinjam_id = $pinjam_baru->id;
            $pinjam_detail->jumlah = $request->jumlah;
            $pinjam_detail->save();
        }else{
            $pinjam_detail = Peminjaman_detail::where('barang_id', $barangs->id)->where('pinjam_id', $pinjam_baru->id)->first();
            $pinjam_detail->jumlah =  $pinjam_detail->jumlah + $request->jumlah;
            $pinjam_detail->save();
        }
       
        $pinjam = Peminjam::where('user_id', Auth::user()->id)->where('pinjam_status',"0")->first();
        $pinjam->jumlah_total = $pinjam->jumlah_total+$request->jumlah;
        $pinjam->update();
        
        return redirect(route('pinjam.index'))->with('success', 'Berhasil ditambahkan!');

    }

    public function checkout(){
        $pinjam = Peminjam::where('user_id', Auth::user()->id)->where('pinjam_status',"0")->first();
        $pinjam_detail = Peminjaman_detail::where('pinjam_id', $pinjam->id)->get();

        return view('mahasiswa.barang.checkout', compact('pinjam', 'pinjam_detail'));
    }

    public function edit($id)
    {
        $pinjam_detail = Peminjaman_detail::find($id);

        return view('mahasiswa.barang.edit', compact('pinjam_detail'));
    }

    public function update(Request $request, $id)
    {
        $pinjam_detail = Peminjaman_detail::find($id);
        $pinjam_detail->jumlah = $request->jumlah;
        $pinjam_detail->save();

        $pinjam = Peminjam::where('user_id', Auth::user()->id)->where('pinjam_status', "0")->first();
        $pinjam->jumlah_total = Peminjaman_detail::where('pinjam_id', $pinjam->id)->sum('jumlah');
        $pinjam->save(); // Use save() instead of update()

        return redirect(route('pinjam.checkout'))->with('success', 'Berhasil diubah!');
    }

    public function destroy($id){ 
        $pinjam_detail = Peminjaman_detail::where('id', $id)->first();

        $pinjam = Peminjam::where('user_id', Auth::user()->id)->where('pinjam_status', "0")->first();
        $pinjam->jumlah_total = $pinjam->jumlah_total-$pinjam_detail->jumlah;
        $pinjam->update();

        $pinjam_detail->delete();

        return redirect(route('pinjam.checkout'))->with('success', 'Berhasil dihapus');
    }

    public function submit(Request $request, $id){ 

        $pinjam = Peminjam::where('user_id', Auth::user()->id)->where('pinjam_status', "0")->first();
        $pinjam->tgl_pinjam = $request->tgl_pinjam;
        $pinjam->tgl_kembali = $request->tgl_kembali;
        $pinjam->pinjam_status = "1";
        $pinjam->update();

        return redirect(route('pinjam.index'))->with('success', 'Berhasil dikirim');
    }

}
