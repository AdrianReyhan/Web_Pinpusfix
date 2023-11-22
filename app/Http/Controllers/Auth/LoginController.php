<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Barang;
use App\Models\Peminjam;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated(){
        $barang = Barang::count();
        $mahasiswa = User::where('role', 'mahasiswa')->count();
        $pegawai = User::where('role', 'admin')->count();
        $peminjam = Peminjam::count();
        $user = Auth::user();
        $peminjamuser = Peminjam::where('user_id', $user->id)->where('pinjam_status', '>', 1)->count();
        if(Auth::user()->role== 'admin'){
            return view('Adminhome',compact('barang','mahasiswa','pegawai','peminjam'));
        }
        else{
        return view('Mahasiswahome',compact('barang','peminjamuser'));
        }
     }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
