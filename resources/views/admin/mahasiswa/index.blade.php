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
                <h3>Data mahasiswa</h3>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                  <p>
                    <a class="btn btn-primary" href="{{ route('mahasiswa.create') }}">Menambah Mahasiswa</a>
                  </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <!-- <th>Jenis Kelamin</th>
                      <th>Nomor Telepon</th> -->
                      <th>Prodi</th>
                      <th>Kelas</th>
                      <th>Semester</th>
                      {{-- =<th>foto</th> --}}
                      <th colspan="4">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $mahasiswa)
                      <tr>
                        <td>{{ $mahasiswa->id }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>
                        <!-- <a href="{{ route('mahasiswa.detail', $mahasiswa->id) }}"> -->
                          {{ $mahasiswa->name }}
                        <!-- </a> -->
                        </td>
                        <td>{{ $mahasiswa->email }}</td>
                        <!-- <td>{{ $mahasiswa->jenis_kelamin }}</td>
                        <td>{{ $mahasiswa->notelp }}</td> -->
                        <td>{{ $mahasiswa->prodi }}</td>
                        <td>{{ $mahasiswa->kelas }}</td>
                        <td>{{ $mahasiswa->semester }}</td>
                        {{-- <td>
                          <img src="{{ asset('fotoktm/' . $mahasiswa->foto_ktm) }}" alt="Foto KTM" style="max-width: 100px; max-height: 100px;">
                        </td> --}}
                        <td>
                          <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                        </td>
                        <td>
                          <a href="{{ route('mahasiswa.detail', $mahasiswa->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                        <td>
                          <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" id= "delete" type="submit">Hapus</button>
                        </form>
                        </td>
                        <td>
                        <form action="{{ route('mahasiswa.reset_pass', $mahasiswa->id) }}" method="POST">
                          <!-- Form fields and submit button -->
                          @csrf
                          @method('PUT')
                          <button class="btn btn-warning btn-sm" id = "reset" type="submit">Reset</button>
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