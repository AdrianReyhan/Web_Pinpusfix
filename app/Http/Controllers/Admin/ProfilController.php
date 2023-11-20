<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class ProfilController extends Controller
{
    public function profil($id)
    {
        $users = User::find($id);
        return view('admin.profil.index', ['users' => $users]);
    }
}

