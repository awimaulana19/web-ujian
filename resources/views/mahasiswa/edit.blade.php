@extends('layouts.app')

@section('title', 'Edit Data')

@section('content')
    <div class="card p-4">
        <h5 class="mb-3">Edit Data</h5>
        <form enctype="multipart/form-data" action="{{ '/home/user/' . $user->id }}" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="nama" class="form-label">Nama :</label>
                    <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                        value="{{ $user->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="nim" class="form-label">Nim :</label>
                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username"
                        value="{{ $user->username }}">
                    @error('username')
                        <div class="invalid-feedback">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="jk" class="form-label">Jenis
                        Kelamin</label>
                    <select class="form-select @error('jk') is-invalid @enderror" name="jk" id="basicSelect">
                        <option value="" selected>Pilh Jenis Kelamin</option>
                        <option value="Laki Laki" @if ($user->jk == "Laki Laki") selected @endif>Laki Laki</option>
                        <option value="Perempuan" @if ($user->jk == "Perempuan") selected @endif>Perempuan</option>
                    </select>
                    @error('jk')
                        <div class="invalid-feedback">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="foto" class="form-label">Foto :</label>
                    <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto">
                    @error('foto')
                        <div class="invalid-feedback">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <a href="/home" class="btn btn-danger me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
