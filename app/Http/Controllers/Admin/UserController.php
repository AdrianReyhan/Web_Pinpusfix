<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    $users = User::where('role', 'mahasiswa')->get();

    return view('admin.mahasiswa.index', ['users' => $users]);
    }

    public function create()
    {
    return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'foto_ktm' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

   

    $tambah_mahasiswa = new User;
    $tambah_mahasiswa->name = $request->name;
    $tambah_mahasiswa->nim = $request->nim;
    $tambah_mahasiswa->email = $request->email;
    $tambah_mahasiswa->password = 'user123';
    $tambah_mahasiswa->jenis_kelamin = $request->jenis_kelamin;
    $tambah_mahasiswa->notelp = $request->notelp;
    $tambah_mahasiswa->semester = $request->semester;
    $tambah_mahasiswa->prodi = $request->prodi;
    $tambah_mahasiswa->kelas = $request->kelas;
    if($request->hasFile('foto_ktm')){
        $request->file('foto_ktm')->move('fotoktm/', $request->file('foto_ktm')->getClientOriginalName());
        $tambah_mahasiswa->foto_ktm = $request->file('foto_ktm')->getClientOriginalName();
        $tambah_mahasiswa->save();
    }
    

    $tambah_mahasiswa->save();

    return redirect(route('mahasiswa.index'))->with('success', 'Berhasil ditambahkan!');
    }

}
