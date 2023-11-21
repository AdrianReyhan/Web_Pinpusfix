<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    public function profil()
    {
        return view('mahasiswa.profil.index')->with('user', auth()->user());
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->notelp = $request->notelp;
        $user->semester = $request->semester;
        $user->prodi = $request->prodi;
        $user->kelas = $request->kelas;

        if($request->hasFile('foto_ktm')){
            $request->file('foto_ktm')->move('fotoktm/', $request->file('foto_ktm')->getClientOriginalName());
            $user->foto_ktm = $request->file('foto_ktm')->getClientOriginalName();
        }
        
        // Check if a new password is provided
        if ($request->has('password')) {
            $userData['password'] = bcrypt($request->input('password'));
        }

        $user->update();

        return redirect(route('pinjam.index'))->with('success', 'Data Profile berhasil diperbarui!');
    }
}
