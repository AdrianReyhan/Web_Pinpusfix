<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
    $users = User::where('role', 'admin')->get();

    return view('admin.pegawai.index', ['users' => $users]);
    }

    public function create()
    {
    return view('admin.pegawai.create');
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required',
        'nim' => 'required',
        'email' => 'required|email',
        'jenis_kelamin' => 'required',
        'notelp' => 'required',
    ]);

   

    $tambah_pegawai = new User;
    $tambah_pegawai->name = $request->name;
    $tambah_pegawai->nim = $request->nim;
    $tambah_pegawai->email = $request->email;
    $tambah_pegawai->password = 'user123';
    $tambah_pegawai->jenis_kelamin = $request->jenis_kelamin;
    $tambah_pegawai->notelp = $request->notelp;
    $tambah_pegawai->role = 'admin';
    

    $tambah_pegawai->save();

    return redirect(route('pegawai.index'))->with('success', 'Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pegawai = User::find($id);
    
        return view('admin.pegawai.edit', compact('pegawai'));
    }
    
    public function update(Request $request, $id){
        $pegawai = User::find($id);
        $pegawai->name = $request->name;
        $pegawai->nim = $request->nim;
        $pegawai->email = $request->email;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->notelp = $request->notelp;

        $pegawai->save();
    
        return redirect(route('pegawai.index'))->with('success', 'Berhasil diubah!');
    }

    public function destroy($id)
    {
        $pegawai = User::find($id);

        if ($pegawai->delete()) {
            return redirect(route('pegawai.index'))->with('success', 'Deleted!');
        }

        return redirect(route('pegawai.index'))->with('error', 'Sorry, unable to delete this!');
    }
    
    public function resetPass($id)
    {
        $pegawai = User::find($id);
        $pegawai->password = bcrypt('user123');
        $pegawai->save();

        // Redirect kembali ke halaman data pegawai dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Password pengguna terpilih berhasil direset menjadi user123.');
    }
}
