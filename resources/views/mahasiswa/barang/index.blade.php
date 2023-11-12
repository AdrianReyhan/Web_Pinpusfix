@extends('layouts.mahasiswa')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <style>
      th {
        text-align: center;
      }
      td {
        text-align: center;
      }

      .panel-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

      .card {
            width: 45%;
            margin: 10px;
        }

      .card img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: 0 auto;
        }
    </style>

  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <div class="card mt-5">
              <div class="card-header" style="background-color: #4169E1; color: white; text-align: center;">
                <?php
                  $pinjam_utama = \App\Models\Peminjam::where('user_id', Auth::user()->id)->where('pinjam_status',"0")->first();
              
                  if ($pinjam_utama) {
                        // Jika $pinjam_utama tidak null
                        $notif = \App\Models\Peminjaman_detail::where('pinjam_id', $pinjam_utama->id)->count();
                    } else {
                        // Jika $pinjam_utama null
                        $notif = 0;
}
                ?>
                <h3>Data Barang</h3>
                <a class="nav-link" href="{{route('pinjam.checkout')}} ">
                  <i class="fas fa-shopping-cart"></i>
                  <span class="badge badge-danger">{{ $notif }}</span></a>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="panel-container">
                  @forelse ($barangs as $alat)
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5 mx-auto">
                          <img src="{{ asset('fotobarang/' . $alat->foto) }}" alt="Foto Barang">
                        </div>
                        <div class="col-md-7">
                          <h4>{{ $alat->nama_barang }}</h4>
                          <p>Jumlah Tersedia: {{ $alat->jumlah_tersedia }}</p>
                          <form action="{{ route('pinjam.pinjam', $alat->id) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" aria-label="Jumlah yang ingin dipinjam" aria-describedby="basic-addon2">
                            </div>
                            <div class="input-group mb-3">
                              <button class="btn btn-success" type="submit">Meminjam</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  @empty
                  <p>No record found!</p>
                  @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}" defer></script>
    
  </body>
</html>

@endsection
