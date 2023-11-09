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
                <h3>Data pegawai</h3>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <p>
                  <a class="btn btn-primary" href="{{ route('pegawai.create') }}">Menambah pegawai</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jenis Kelamin</th>
                      <th>Nomor Telepon</th>
                      <th colspan="3">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $pegawai)
                      <tr>
                        <td>{{ $pegawai->nim }}</td>
                        <td>{{ $pegawai->name }}</td>
                        <td>{{ $pegawai->email }}</td>
                        <td>{{ $pegawai->jenis_kelamin }}</td>
                        <td>{{ $pegawai->notelp }}</td>
                        {{-- <td>
                          <img src="{{ asset('fotoktm/' . $pegawai->foto_ktm) }}" alt="Foto KTM" style="max-width: 100px; max-height: 100px;">
                        </td> --}}
                        <td>
                          <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-secondary btn-sm mr-2">Edit</a>
                        </td>
                        <td>
                          <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" id= "delete" type="submit">Hapus</button>
                        </form>
                        </td>
                        <td>
                        <form action="{{ route('pegawai.reset_pass', $pegawai->id) }}" method="POST">
                          <!-- Form fields and submit button -->
                          @csrf
                          @method('PUT')
                          <button class="btn btn-warning btn-sm ml-2" id= "reset" type="submit" >Reset</button>
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