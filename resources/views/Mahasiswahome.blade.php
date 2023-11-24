@extends('layouts.mahasiswa')
@section('content')
<div class="row mb-3">
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-info">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm text-light font-weight-bold text-uppercase mb-1">Barang</div>
                        <div class="text-sm text-light h5 mb-0 font-weight-bold"> {{ $barang }} </div>
                        <div class="button mt-2"><a href="/mahasiswa/pinjam" class="text-light">Lihat</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-book-open fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-success">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm text-light font-weight-bold text-uppercase mb-1">Peminjaman</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-light"> {{$peminjamuser}} </div>
                        <div class="button mt-2"><a href="/mahasiswa/history" class="text-light">Lihat</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-table fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
</div>

<div class="card bg-gradient-secondary">
    <div class="container">
        <h3 class="text-light"> <i class="fa-solid fa-circle-info text-light my-3"></i> Informasi Aturan Peminjaman</h3>
        <ol class=text-light>
            <li class=text-light>Waktu peminjaman maksimal 1 minggu</li>
            <li class=text-light>Setiap anggota hanya dapat meminjam maksimal 5 barang</li>
            <li class=text-light>Jika pengenbalian barang lebih dari waktu yang ditentukan akan diberikan denda setiap barang Rp.15.000/minggu.</li>
            <li class=text-light>Jika telah meminjam barang,silahkan ke tempat petugas untuk melakukan konfirmasi</li>
            <li class=text-light>Jika Terlambat mengembalikan barang dan mendapat denda, maka wajib langsung membayar pada petugas saat mengembalikan barang</li>
        </ol>
    </div>
</div>
@endsection
