@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('content')
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="mb-3">
                <h5>Data Mahasiswa</h5>
            </div>
        </div>
        <div>
            <table class="table table-hover" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIM</th>
                        <th>Jenis Kelamin</th>
                        <th>Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>
                                @if ($item->status_verifikasi == true)
                                    Terverifikasi
                                @else
                                    <a class="btn btn-success me-2" href="{{ url('/mahasiswa/verifikasi/' . $item->id) }}">
                                        <i class="fs-6 bi bi-check"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
