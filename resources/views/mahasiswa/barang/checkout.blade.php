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
    </style>

  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <div class="card mt-5">
              <div class="card-header" style="background-color: #4169E1	; color: white; text-align: center;">
                <h3>Data Peminjaman Detail</h3>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div>
                    <span class="ml-2">Tanggal: {{  $pinjam->tgl_pesan }}</span>
                </div>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto Barang</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th colspan="2">Actions</th>
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
                        <td>
                          <a href="{{ route('checkout.edit', $pinjam_details->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                        </td>
                        <td>
                          <form action="{{ route('checkout.destroy', $pinjam_details->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" id= "delete" type="submit">Hapus</button>
                        </form>
                        </td>
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
                <form method="post" action="{{route('checkout.submit', $pinjam->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Mulai Pinjam</label>
                    <input type="date" class="form-control" name="tgl_pinjam" >
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Selesai Pinjam</label>
                    <input type="date" class="form-control" name="tgl_kembali" >
                  </div>
                  <div class="card-footer">
                    <div class="row">
                        <div class="col"></div> <!-- This empty div pushes the button to the right -->
                        <div class="col-auto">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>                
                </form>
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