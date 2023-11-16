<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('role', 'mahasiswa')->get();

        return view('admin.mahasiswa.index', ['users' => $users]);
    }

    
}
