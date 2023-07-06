@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-5">
                <div class="row">
                    <h3 class="mb-4">Profile</h3>
                    <div class="row pb-3">
                        <div class="col-lg-7 col-md-12 align-self-center">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <p class="fw-bold">
                                    {{ auth()->user()->nama }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIM</label>
                                <p class="fw-bold">
                                    {{ auth()->user()->username }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <p class="fw-bold">
                                    {{ auth()->user()->jk }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 align-self-center">
                            <div class="mb-3">
                                <img src="{{ asset('images/' . auth()->user()->foto) }}" alt="profile" width="100%"
                                    style="max-height: 300px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
