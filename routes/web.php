
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'auth.login');



Route::get('login', 'App\Http\Controllers\AuthController@login')->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'checkRole:admin'])->group(function () {

    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('mahasiswa','index')->name('mahasiswa.index'); // Add this line
        Route::get('mahasiswa/create', 'create')->name('mahasiswa.create');
        Route::post('mahasiswa', 'store')->name('mahasiswa.store');
        Route::get('mahasiswa/detail{id}', 'detail')->name('mahasiswa.detail');
        Route::get('mahasiswa/{id}/edit', 'edit')->name('mahasiswa.edit');
        Route::put('mahasiswa/{id}', 'update')->name('mahasiswa.update');
        Route::post('mahasiswa/{id}','destroy')->name('mahasiswa.destroy');
        Route::put('mahasiswa/reset-pass/{id}', 'resetPass')->name('mahasiswa.reset_pass');
    });
});