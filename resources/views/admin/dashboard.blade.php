@extends('layouts.App')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card p-5">
                <div class="row">
                    <h3 class="mb-3">Soal</h3>
                    <div class="d-flex align-items-center">
                        <i class="fs-1 bi bi-book me-3"></i>
                        <h4 class="fs-1">5</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-5">
                <div class="row">
                    <h3 class="mb-3">Mahasiswa</h3>
                    <div class="d-flex align-items-center">
                        <i class="fs-1 bi bi-person-fill me-3"></i>
                        <h4 class="fs-1">8</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
