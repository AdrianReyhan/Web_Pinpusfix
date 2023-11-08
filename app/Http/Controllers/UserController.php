<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Constructor to set middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Method for mahasiswa (non-admin) users
    public function mahasiswaDashboard()
    {
        // Check if the user has the 'mahasiswa' role
        if (Auth::user()->role === 'mahasiswa') {
            // Add your mahasiswa-specific logic here
            return view('mahasiswa.dashboard');
        } else {
            // Redirect admin users to a different page or show an error message
            return redirect('/admin/dashboard')->with('error', 'Admins are not allowed to access this page.');
        }
    }

    // Method for admin users
    public function adminDashboard()
    {
        // Check if the user has the 'admin' role
        if (Auth::user()->role === 'admin') {
            // Add your admin-specific logic here
            return view('admin.mahasiswa');
        } else {
            // Redirect non-admin users to a different page or show an error message
            return redirect('/home')->with('error', 'You do not have permission to access this page.');
        }
    }
}
