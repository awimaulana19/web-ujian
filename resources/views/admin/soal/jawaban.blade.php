@extends('layouts.app')

@section('title', 'Jawaban')

@section('content')
    <div class="card p-4">
        <h5 class="mb-3">Soal</h5>
        {{ $soal->soal }}
        <hr class="my-4">
        <h5 class="mb-3">Jawaban</h5>
        <form enctype="multipart/form-data" action="{{ '/soal/jawaban/' . $soal->id }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="jawabanA" class="form-label">Jawaban A :</label>
                <input class="form-control @error('jawabanA') is-invalid @enderror" type="text" name="jawabanA"
                    value="{{ $a->jawaban }}">
                @error('jawabanA')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jawabanB" class="form-label">Jawaban B :</label>
                <input class="form-control @error('jawabanB') is-invalid @enderror" type="text" name="jawabanB"
                    value="{{ $b->jawaban }}">
                @error('jawabanB')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jawabanC" class="form-label">Jawaban C :</label>
                <input class="form-control @error('jawabanC') is-invalid @enderror" type="text" name="jawabanC"
                    value="{{ $c->jawaban }}">
                @error('jawabanC')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jawabanD" class="form-label">Jawaban D :</label>
                <input class="form-control @error('jawabanD') is-invalid @enderror" type="text" name="jawabanD"
                    value="{{ $d->jawaban }}">
                @error('jawabanD')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jawabanE" class="form-label">Jawaban E :</label>
                <input class="form-control @error('jawabanE') is-invalid @enderror" type="text" name="jawabanE"
                    value="{{ $e->jawaban }}">
                @error('jawabanE')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label me-3">Jawaban Benar :</label>
                <div class="form-check form-check-inline ml-auto">
                    <input class="form-check-input" type="radio" name="benar" id="radio1" value="A"
                        {{ $a->is_correct == true ? 'checked' : '' }}>
                    <label class="form-check-label" for="radio1">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="benar" id="radio2" value="B"
                        {{ $b->is_correct == true ? 'checked' : '' }}>
                    <label class="form-check-label" for="radio2">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="benar" id="radio3" value="C"
                        {{ $c->is_correct == true ? 'checked' : '' }}>
                    <label class="form-check-label" for="radio3">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="benar" id="radio4" value="D"
                        {{ $d->is_correct == true ? 'checked' : '' }}>
                    <label class="form-check-label" for="radio4">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="benar" id="radio5" value="E"
                        {{ $e->is_correct == true ? 'checked' : '' }}>
                    <label class="form-check-label" for="radio5">E</label>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/soal" class="btn btn-danger me-2">Batal</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
    </div>
@endsection
