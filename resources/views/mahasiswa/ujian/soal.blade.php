@extends('layouts.app')

@section('title', 'Soal')

@section('content')
    <div class="card p-4">
        <form action="{{ '/ujian/soal/' . Auth::user()->id }}" method="POST">
            @csrf
            <div class="row">
                <h4 class="mb-4">Soal</h4>
                @php
                    $soal = $soal->shuffle();
                @endphp
                @foreach ($soal as $item)
                    @php
                        $jawaban = $item->jawaban->shuffle();
                    @endphp
                    <div class="mb-3">
                        <h6>{{ $loop->iteration }}. {{ $item->soal }}</h6>
                        <div class="pilih">
                            @foreach ($jawaban as $pilih)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{ 'soal' . $item->id }}"
                                        id="{{ 'radio' . $pilih->id }}" value="{{ $pilih->id }}">
                                    <label class="form-check-label"
                                        for="{{ 'radio' . $pilih->id }}">{{ chr($loop->iteration + 64) }}.
                                        {{ $pilih->jawaban }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-success mt-2">Submit</button>
            </div>
        </form>
    </div>
@endsection
