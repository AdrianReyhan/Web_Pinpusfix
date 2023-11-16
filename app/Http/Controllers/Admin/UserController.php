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
        'name' => 'required',
        'nim' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'jenis_kelamin' => 'required',
        'notelp' => 'required',
        'semester' => 'required',
        'prodi' => 'required',
        'kelas' => 'required',
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

    public function detail($id)
    {
        $mahasiswa = User::find($id);
    
        return view('admin.mahasiswa.detail', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswa = User::find($id);
    
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }
    
    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'notelp' => 'required',
            'semester' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'foto_ktm' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $mahasiswa = User::find($id);
        $mahasiswa->name = $request->name;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->email = $request->email;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->notelp = $request->notelp;
        $mahasiswa->semester = $request->semester;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->kelas = $request->kelas;
        
        if($request->hasFile('foto_ktm')){
            $request->file('foto_ktm')->move('fotoktm/', $request->file('foto_ktm')->getClientOriginalName());
            $mahasiswa->foto_ktm = $request->file('foto_ktm')->getClientOriginalName();
        }
        
        $mahasiswa->update();
    
        return redirect(route('mahasiswa.index'))->with('success', 'Berhasil diubah!');
    }

    public function destroy($id)
    {
        $mahasiswa = User::findOrFail($id);

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa not found'
            ]);
        }
    
        if ($mahasiswa->delete()) {
            return redirect(route('mahasiswa.index'))->with('success', 'Akun mahasiswa dihapus');
        } else {
            return redirect(route('mahasiswa.index'))->with('danger', 'Akun mahasiswa gagal dihapus');
        }
    }
    
    public function resetPass($id)
    {
        $mahasiswa = User::find($id);
        $mahasiswa->password = bcrypt('user123');
        $mahasiswa->save();

        // Redirect kembali ke halaman data pegawai dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Password pengguna terpilih berhasil direset menjadi user123.');
    }

}
