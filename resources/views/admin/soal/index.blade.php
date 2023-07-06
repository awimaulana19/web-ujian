@extends('layouts.app')

@section('title', 'Soal')

@section('content')
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="mb-3">
                <h5>Data Soal</h5>
            </div>
            <div class="mb-3">
                @if (auth()->user()->admin_start === 0)
                    <a href="/soal/mulai" class="btn btn-primary px-4 py-2">Mulai Ujian</a>
                @else
                    <a href="/soal/akhiri" class="btn btn-danger px-4 py-2">Akhiri Ujian</a>
                @endif
            </div>
            <div class="mb-3">
                <button class="btn btn-success px-4 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
                    Soal</button>
            </div>
        </div>
        <div>
            <table class="table table-hover" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($soal as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->soal }}</td>
                            <td>
                                <a class="btn btn-success me-2" href="{{ url('/soal/jawaban/' . $item->id) }}">
                                    <i class="fs-6 bi bi-book"></i>
                                </a>
                            </td>
                            <td class="d-flex align-items-center">
                                <button class="btn btn-primary me-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#{{ 'edit' . $item->id }}">
                                    <i class="fs-6 bi bi-pen"></i>
                                </button>
                                <a class="btn btn-danger me-2" href="{{ url('/soal/hapus/' . $item->id) }}">
                                    <i class="fs-6 bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@foreach ($soal as $item)
    @include('admin.soal.edit')
@endforeach

@include('admin.soal.tambah')
