<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Jawaban;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index()
    {
        $soal = Soal::get();
        return view('admin.soal.index', compact('soal'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'soal' => 'required|string|max:5000',
        ]);

        $soal = new Soal();
        $soal->soal = $validatedData['soal'];
        $soal->save();

        $jawabanA = new Jawaban();
        $jawabanA->soal_id = $soal->id;
        $jawabanA->save();
        $jawabanB = new Jawaban();
        $jawabanB->soal_id = $soal->id;
        $jawabanB->save();
        $jawabanC = new Jawaban();
        $jawabanC->soal_id = $soal->id;
        $jawabanC->save();
        $jawabanD = new Jawaban();
        $jawabanD->soal_id = $soal->id;
        $jawabanD->save();
        $jawabanE = new Jawaban();
        $jawabanE->soal_id = $soal->id;
        $jawabanE->save();

        return redirect('/soal')->with('success', 'Soal Telah Dibuat.');
    }

    public function update(Request $request, $id)
    {
        $soal = Soal::where('id', $id)->first();

        $validatedData = $request->validate([
            'soal' => 'required|string|max:5000',
        ]);

        $soal->soal = $validatedData['soal'];
        $soal->update();

        return redirect('/soal')->with('success', 'Soal di Edit.');
    }

    public function destroy($id)
    {
        $soal = Soal::where('id', $id)->first();
        $soal->delete();

        return redirect('/soal')->with('success', 'Soal di Hapus.');
    }

    public function mulai_ujian()
    {
        $admin = User::where('roles', 'admin')->first();

        $admin->admin_start = true;
        $admin->update();

        return redirect('/soal');
    }

    public function akhiri_ujian()
    {
        $admin = User::where('roles', 'admin')->first();

        $admin->admin_start = false;
        $admin->update();

        $nilai = Nilai::get();

        Nilai::destroy($nilai);

        return redirect('/soal');
    }
}
