<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Jawaban;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function edit($id)
    {
        $soal = Soal::where('id', $id)->first();
        $jawaban = Jawaban::where('soal_id', $id)->get();

        foreach ($jawaban as $key => $value) {
            if ($key == 0) {
                $a = $value;
            } elseif ($key == 1) {
                $b = $value;
            } elseif ($key == 2) {
                $c = $value;
            } elseif ($key == 3) {
                $d = $value;
            } elseif ($key == 4) {
                $e = $value;
            }
        }

        return view('admin.soal.jawaban', compact('soal', 'a', 'b', 'c', 'd', 'e'));
    }

    public function update(Request $request, $id)
    {
        $jawaban = Jawaban::where('soal_id', $id)->get();

        foreach ($jawaban as $key => $value) {
            if ($key == 0) {
                $value->jawaban = $request->jawabanA;
                if ($request->benar == "A") {
                    $value->is_correct = true;
                } else {
                    $value->is_correct = false;
                }
                $value->update();
            } elseif ($key == 1) {
                $value->jawaban = $request->jawabanB;
                if ($request->benar == "B") {
                    $value->is_correct = true;
                } else {
                    $value->is_correct = false;
                }
                $value->update();
            } elseif ($key == 2) {
                $value->jawaban = $request->jawabanC;
                if ($request->benar == "C") {
                    $value->is_correct = true;
                } else {
                    $value->is_correct = false;
                }
                $value->update();
            } elseif ($key == 3) {
                $value->jawaban = $request->jawabanD;
                if ($request->benar == "D") {
                    $value->is_correct = true;
                } else {
                    $value->is_correct = false;
                }
                $value->update();
            } elseif ($key == 4) {
                $value->jawaban = $request->jawabanE;
                if ($request->benar == "E") {
                    $value->is_correct = true;
                } else {
                    $value->is_correct = false;
                }
                $value->update();
            }
        }

        return redirect('/soal')->with('success', 'Jawaban Di Update');
    }
}
