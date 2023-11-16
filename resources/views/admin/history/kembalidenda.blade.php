@extends('layouts.admin')

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
            <form method="post" action="{{ route('kembali.denda.update', $peminjams->id) }}" enctype="multipart/form-data">
            @method('PUT')
              @csrf
              <div class="card mt-5">
                <div class="card-header" style="background-color: #4169E1	; color: white; text-align: center;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Kembali</h3>
                        <a href="{{ route('aprove.index') }}" class="btn btn-danger mb-12">Back</a>
                        </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <div class="alert-title"><h4>Whoops!</h4></div>
                          There are some problems with your input.
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div> 
                    @endif

                    @if ($errors->has('email'))
                    <div class="alert alert-danger">
                      <strong>Error:</strong> {{ $errors->first('email') }}
                    </div>
                  @endif
                    @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                      <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="panel-container">
                      @forelse ($pinjam_details as $peminjam_detail)
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-5 mx-auto">
                              <img src="{{ asset('fotobarang/' . $peminjam_detail->barang->foto) }}" alt="Foto Barang">
                            </div>
                            <div class="col-md-7">
                              <p>Pinjam:</p>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="jumlah" placeholder=" {{ $peminjam_detail->jumlah}}" value="{{ $peminjam_detail->jumlah}}" aria-label="Jumlah yang ingin dipinjam" aria-describedby="basic-addon2" readonly>
                                </div>
                              <h4>{{ $peminjam_detail->nama_barang }}</h4>
                              <p>Tersedia:</p>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="jumlah_tersedia" placeholder="{{ $peminjam_detail->barang->jumlah_tersedia }}" value="{{ $peminjam_detail->barang->jumlah_tersedia}}" aria-label="Jumlah yang ingin dipinjam" aria-describedby="basic-addon2">
                                </div>
                                <p>Rusak:</p>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="jumlah_rusak" placeholder=" {{ $peminjam_detail->barang->jumlah_rusak }}" value="{{ $peminjam_detail->barang->jumlah_rusak}}" aria-label="Jumlah yang ingin dipinjam" aria-describedby="basic-addon2">
                                </div>
                              <p>Hilang:</p>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="jumlah_hilang" placeholder=" {{ $peminjam_detail->barang->jumlah_hilang }}" value="{{ $peminjam_detail->barang->jumlah_hilang}}" aria-label="Jumlah yang ingin dipinjam" aria-describedby="basic-addon2">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @empty
                      <p>No record found!</p>
                      @endforelse
                    </div>
                      <div class="mb-3">
                        <label class="form-label">Pesan</label>
                        <input type="text" class="form-control" name="pesan" value="{{ $peminjams->pesan }}" placeholder="Pesan">
                      </div>             
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}" defer></script>

  </body>
</html>

@endsection