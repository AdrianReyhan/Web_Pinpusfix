<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ProfilController extends Controller
{
    public function profil()
    {
        return view('admin.profil.index')->with('user', auth()->user());

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

        // Check if a new password is provided
        if ($request->has('password')) {
            $userData['password'] = bcrypt($request->input('password'));
        }

        $user->update();

        return redirect(route('barang.index'))->with('success', 'Data Profile berhasil diperbarui!');
    }


}
