<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();

        return view('admin.barang.index', ['barangs' => $barangs]);
    }

    /* public function home()
    {
        $barangs = Barang::all();

        return view('admin.mahasiswa.index', ['barangs' => $barangs]);
    } */

    public function create()
    {
        return view('admin.barang.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'jumlah_tersedia' => 'required',
            'jumlah_rusak' => 'required',
            'jumlah_hilang' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);



        $tambah_barang = new Barang;
        $tambah_barang->nama_barang = $request->nama_barang;
        $tambah_barang->jumlah_tersedia = $request->jumlah_tersedia;
        $tambah_barang->jumlah_rusak = $request->jumlah_rusak;
        $tambah_barang->jumlah_hilang = $request->jumlah_hilang;
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobarang/', $request->file('foto')->getClientOriginalName());
            $tambah_barang->foto = $request->file('foto')->getClientOriginalName();
            $tambah_barang->save();
        }


        $tambah_barang->save();

        return redirect(route('barang.index'))->with('success', 'Berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $alat = Barang::find($id);

        return view('admin.barang.edit', compact('alat'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'jumlah_tersedia' => 'required',
            'jumlah_rusak' => 'required',
            'jumlah_hilang' => 'required',
            /* 'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', */
        ]);


        $alat = Barang::find($id);
        $alat->nama_barang = $request->nama_barang;
        $alat->jumlah_tersedia = $request->jumlah_tersedia;
        $alat->jumlah_rusak = $request->jumlah_rusak;
        $alat->jumlah_hilang = $request->jumlah_hilang;

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotobarang/', $request->file('foto')->getClientOriginalName());
            $alat->foto = $request->file('foto')->getClientOriginalName();
        }

        $alat->update();

        return redirect(route('barang.index'))->with('success', 'Berhasil diubah!');
    }

    public function destroy($id)
    {
        $alat = Barang::findOrFail($id);

        if (!$alat) {
            return response()->json([
                'success' => false,
                'message' => 'barang not found'
            ]);
        }

        if ($alat->delete()) {
            return redirect(route('barang.index'))->with('success', 'Barang dihapus');
        } else {
            return redirect(route('barang.index'))->with('danger', 'Barang gagal dihapus');
        }
    }
}
