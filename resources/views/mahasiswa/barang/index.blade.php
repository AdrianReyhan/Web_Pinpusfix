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

      .container {
            max-width: 1200px;
            margin: 0 auto;
        }

      .panel-container {
            float: left;
            text-align: left;
           justify-content: space-around;
        }

        .card {
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }

      .card img {
            max-width: 89px;
            max-height: 89px;
            margin:  auto;
            display: flex;

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
                <h3>Data Barang</h3>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="panel-container">
                  <div class="row">
                    @forelse ($barangs as $alat)
                      <div class="col-md-6">
                        <div class="card mt-4">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-5">
                                <img src="{{ asset('fotobarang/' . $alat->foto) }}" alt="Foto Barang" class="img-fluid">
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
                      </div>
                    @empty
                      <div class="col-md-12">
                        <p>No record found!</p>
                      </div>
                    @endforelse
                  </div>
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
