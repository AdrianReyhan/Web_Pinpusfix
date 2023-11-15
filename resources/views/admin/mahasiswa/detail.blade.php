@extends('layouts.admin')

@section('content')


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
     
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <form method="post" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" enctype="multipart/form-data">
            @method('PUT')
              @csrf
              <div class="card mt-5">
                <div class="card-header" style="background-color: #4169E1	; color: white; text-align: center;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Detail Mahasiswa</h3>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger mb-12">Back</a>
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
                      <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $mahasiswa->name }}" placeholder="Nama" readonly>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Foto KTM</label>
                        @if ($mahasiswa->foto_ktm)
                            <img src="{{ asset('fotoktm/' . $mahasiswa->foto_ktm) }}" style="max-width: 100px; max-height: 100px;">
                        @else
                            <p>No Image</p>
                        @endif
                    </div>
                      <div class="mb-3">
                          <label class="form-label">NIM</label>
                          <input type="text" class="form-control" name="nim" value="{{ $mahasiswa->nim }}" placeholder="NIM" readonly>
                        </div>
                      <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $mahasiswa->email }}"  placeholder="Email" readonly>
                      </div>
                      <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin">
                          <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki - laki</option>
                          <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                      <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" class="form-control" name="notelp" value="{{ $mahasiswa->notelp }}"  placeholder="No Telepeon" readonly>
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Semester</label>
                          <input type="text" class="form-control" name="semester" value="{{ $mahasiswa->semester }}"  placeholder="semester" readonly>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Prodi</label>
                        <input type="text" class="form-control" name="prodi" value="{{ $mahasiswa->prodi }}"  placeholder="prodi" readonly>
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Kelas</label>
                          <input type="text" class="form-control" name="kelas" value="{{ $mahasiswa->kelas }}"  placeholder="kelas" readonly>
                        </div>     
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