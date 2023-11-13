@extends('layouts.master')

@section('navbar')
@include('layouts.mahasiswa.navbar')
@endsection

@section('sidebar')
@include('layouts.mahasiswa.sidebar')
@endsection

@section('judul')
<h2 class="text-primary"> Selamat Datang, {{ Auth::user()->name }}</h2>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-primary">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-uppercase mb-1 text-light">Jumlah Buku</div>
                        <div class="text-sm text-light h5 mb-0 font-weight-bold">buku</div>
                        <div class="button mt-2"><a href="/buku" class="text-light">Lihat</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-book fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-info">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm text-light font-weight-bold text-uppercase mb-1">Kategori</div>
                        <div class="text-sm text-light h5 mb-0 font-weight-bold">kategori</div>
                        <div class="button mt-2"><a href="/kategori" class="text-light">Lihat</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-bookmark fa-3x text-light"></i>
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
                        <div class="text-sm text-light font-weight-bold text-uppercase mb-1">Anggota</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-light">user</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-danger">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm text-light font-weight-bold text-uppercase mb-1" style="font-size:.8rem">Pinjaman Saat ini</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-light">pinjamanUser</div>
                        <div class="button mt-2"><a href="/peminjaman" class="text-light">Lihat</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-gradient-secondary">
    <div class="container">
        <h3 class="text-light"> <i class="fa-solid fa-circle-info text-light my-3"></i> Informasi Aturan Peminjaaman</h3>
        <ol class=text-light>
            <li class=text-light>Waktu peminjaman maksimal 1 minggu</li>
            <li class=text-light>Setiap anggota hanya dapat meminjam maksima 3 buku</li>
            <li class=text-light>Jika pengenbalian buku lebih dari waktu yang ditentukan akan diberikan denda setiap buku Rp.15.000/minggu.</li>
            <li class=text-light>Jika telah meminjam buku,silahkan ke tempat petugas untuk melakukan konfirmasi</li>
            <li class=text-light>Jika Terlambat mengembalikan buku dan mendapat denda, maka wajib langsung membayar pada petugas saat mengembalikan buku</li>
        </ol>
    </div>
</div>
@endsection


<script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>

<script src="{{ asset('admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/js/template.js') }}"></script>

<script src="{{ asset('admin/js/dashboard.js') }}"></script>
<script src="{{ asset('admin/js/data-table.js') }}"></script>
<script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat mengembalikan tindakan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>