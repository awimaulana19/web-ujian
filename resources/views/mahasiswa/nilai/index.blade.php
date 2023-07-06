@extends('layouts.App')

@section('title', 'Nilai')

@section('content')
    @if ($user->nilai_ujian === null)
        <div class="card p-4">
            <div class="d-flex justify-content-center align-items-center" style="margin: 10% 0">
                <h2>Ujian Belum Dikerjakan</h2>
            </div>
        </div>
    @else
        <div class="card p-4">
            <div class="d-flex flex-column justify-content-center align-items-center" style="margin: 4% 0">
                <h2>Nilai Anda</h2>
                <h3>{{ $user->nilai_ujian }}</h3>
                <br>
                <h3>Dengan Jumlah Benar Dan Salah</h3>
                <h4>Benar : {{ $user->jumlah_benar }}</h4>
                <h4>Salah : {{ $user->jumlah_salah }}</h4>
            </div>
        </div>
    @endif
@endsection
