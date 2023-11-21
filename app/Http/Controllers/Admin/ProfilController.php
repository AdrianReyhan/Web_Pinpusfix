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
        /*  $loggedInUser = Auth::user();
        $profile = User::where('id', $loggedInUser)->first(); // Fetch the currently logged-in user
        return redirect('admin.profile.index', compact('profile')); */
        $iduser = Auth::id();
        $profile = User::where('id', $iduser)->first();
        return view('profile.tampil', ['profile' => $profile]);
    }
}
