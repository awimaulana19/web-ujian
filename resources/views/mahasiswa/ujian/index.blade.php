@extends('layouts.app')

@section('title', 'Ujian')

@section('content')
    @if ($status === 0)
        <div class="card p-4">
            <div class="d-flex justify-content-center align-items-center" style="margin: 10% 0">
                <h2 class="text-center">Ujian Belum Dimulai/Selesai</h2>
            </div>
        </div>
    @else
        <div class="card p-4">
            @if (session('error'))
                <p class="alert alert-danger">{{ session('error') }}</p>
            @endif
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            <div class="d-flex flex-column justify-content-center align-items-center" style="margin: 10% 0">
                <h2 class="text-center">Ujian Dimulai</h2>
                <a href="/ujian/soal" class="btn btn-primary mt-2">Mulai Ujian</a>
            </div>
        </div>
    @endif
@endsection
