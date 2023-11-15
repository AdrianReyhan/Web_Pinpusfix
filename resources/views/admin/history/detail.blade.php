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
    </style>

  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <div class="card mt-5">
              <div class="card-header" style="background-color: #4169E1	; color: white; text-align: center;">
                <div class="d-flex justify-content-between align-items-center">
                  <h3>Data Peminjaman Detail</h3>
                  <a href="{{ route('aprove.index') }}" class="btn btn-danger mb-12">Back</a>
                
                  </div>
               
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="row mt-3">
                  <div class="col-md-4">
                    <strong class="ml-2">Tanggal Pesan:</strong> {{ $peminjams->tgl_pesan }}
                  </div>
                  <div class="col-md-4">
                    <strong class="ml-2">Tanggal Pinjam:</strong> {{ $peminjams->tgl_pinjam }}
                  </div>
                  <div class="col-md-4">
                    <strong class="ml-2">Tanggal Kembali:</strong> {{ $peminjams->tgl_kembali }}
                  </div>
                </div>
              </div>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto Barang</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    @forelse ($pinjam_detail as $pinjam_details)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                          <img src="{{ asset('fotobarang/' . $pinjam_details->barang->foto) }}" alt="Foto Barang" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>{{ $pinjam_details->barang->nama_barang }}</td>
                        <td>{{ $pinjam_details->jumlah }}</td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="6">
                            No record found!
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              
  
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