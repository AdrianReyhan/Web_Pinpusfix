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
<<<<<<< HEAD
        /*  $loggedInUser = Auth::user();
        $profile = User::where('id', $loggedInUser)->first(); // Fetch the currently logged-in user
        return redirect('admin.profile.index', compact('profile')); */
        $iduser = Auth::id();
        $profile = User::where('id', $iduser)->first();
        return view('profile.tampil', ['profile' => $profile]);
=======
        return view('admin.profil.index')->with('user', auth()->user());
>>>>>>> 71a23822d9747515384e793d989435a0698e4b98
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
