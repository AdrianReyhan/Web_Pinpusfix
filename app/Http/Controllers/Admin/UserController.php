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

}
