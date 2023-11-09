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
                <h3>Data Barang</h3>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                  <p>
                    <a class="btn btn-primary" href="{{ route('barang.create') }}">Menambah Barang</a>
                  </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Foto Barang</th>
                      <th>Nama</th>
                      <th>Jumlah Ada</th>
                      <th>Jumlah Rusak</th>
                      <th>Jumlah Hilang</th>
                      <th colspan="3">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($barangs as $alat)
                      <tr>
                        <td>{{ $alat->id }}</td>
                        <td>
                          <img src="{{ asset('fotobarang/' . $alat->foto) }}" alt="Foto Barang" style="max-width: 100px; max-height: 100px;">
                        </td>
                        <td>{{ $alat->nama_barang }}</td>
                        <td>{{ $alat->jumlah_tersedia }}</td>
                        <td>{{ $alat->jumlah_rusak }}</td>
                        <td>{{ $alat->jumlah_hilang }}</td>

                        <td>
                          <a href="{{ route('barang.edit', $alat->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                        </td>
                        <td>
                          <form action="{{ route('barang.destroy', $alat->id) }}" method="POST">
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