@extends('layouts.master')


@section('sidebar')
@include('layouts.admin.sidebar')
@endsection

@section('navbar')
@include('layouts.admin.navbar')
@endsection

<!-- @section('judul')
    <h1 class="text-primary">Dashboard</h1>
@endsection -->

<!-- @push('styles')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.12.1/date-1.1.2/fc-4.1.0/r-2.3.0/sc-2.0.7/datatables.min.css" />
@endpush -->


@push('scripts')
<script src="{{ '/template/vendor/datatables/jquery.dataTables.min.js' }}"></script>
<script src="{{ '/template/vendor/datatables/dataTables.bootstrap4.min.js' }}"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
@endpush



<!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/date-1.1.2/fc-4.1.0/r-2.3.0/sc-2.0.7/datatables.min.css" />
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />



@section('content')
<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
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
                        <div class="button mt-2"><a href="/anggota" class="text-light">Lihat</a></div>
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
                        <div class="text-sm text-light font-weight-bold text-uppercase mb-1" style="font-size:.8 rem">Riwayat Peminjamam</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-light">jumlah_riwayat</div>
                        <div class="button mt-2"><a href="#" class="text-light">Lihat</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>
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