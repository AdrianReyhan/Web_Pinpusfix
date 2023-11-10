@extends('layouts.mahasiswa')

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
                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Detail Mahasiswa</h3>
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger mb-12">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $mahasiswa->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $mahasiswa->email }}</td>
                                </tr>
                                <tr>
                                    <th>NIM</th>
                                    <td>{{ $mahasiswa->nim }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>Telepeon</th>
                                    <td>{{ $mahasiswa->notelp }}</td>
                                </tr>
                                <tr>
                                    <th>Semester</th>
                                    <td>{{ $mahasiswa->semester }}</td>
                                </tr>
                                <tr>
                                    <th>Prodi</th>
                                    <td>{{ $mahasiswa->prodi }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>{{ $mahasiswa->kelas }}</td>
                                </tr>
                                <tr>
                                    <th>Foto KTM</th>
                                    <td>
                                        @if ($mahasiswa->foto_ktm)
                                        <img src="{{ asset('fotoktm/' . $mahasiswa->foto_ktm) }}" style="max-width: 100px; max-height: 100px;">
                                        @else
                                        No Image
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-footer">
                            <!-- Button or additional information if needed -->
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