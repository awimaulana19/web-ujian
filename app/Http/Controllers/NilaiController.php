<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\User;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function jawab_mahasiswa(Request $request, $id)
    {
        $nilai = Nilai::where('user_id', $id)->get();
        // $this->authorize('view', $nilai);
        if ($nilai->isEmpty()) {
            $user = User::where('id', $id)->first();
            $soal = Soal::get();

            foreach ($soal as $item) {
                foreach ($item->jawaban as $pilih) {
                    if ($request->{'soal' . $item->id} == $pilih->id) {
                        if ($pilih->is_correct) {
                            $nilai = new nilai();
                            $nilai->user_id = $user->id;
                            $nilai->soal_id = $pilih->soal_id;
                            $nilai->benar = true;

                            $nilai->save();
                        } else {
                            $nilai = new nilai();
                            $nilai->user_id = $user->id;
                            $nilai->soal_id = $pilih->soal_id;
                            $nilai->benar = false;

                            $nilai->save();
                        }
                    }
                }
            }

            $jumlah_soal = $soal->count();
            $jumlahBenar = 0;
            $jumlahSalah = 0;

            $nilai = Nilai::where('user_id', $user->id)->get();

            foreach ($nilai as $item) {
                if ($item->benar) {
                    $jumlahBenar = $jumlahBenar + 1;
                }
                if (!$item->benar) {
                    $jumlahSalah = $jumlahSalah + 1;
                }
            }

            $nilai_ujian = ($jumlahBenar / $jumlah_soal) * 100;

            $user->jumlah_benar = $jumlahBenar;
            $user->jumlah_salah = $jumlahSalah;
            $user->nilai_ujian = $nilai_ujian;
            $user->update();

            return redirect('/ujian')->with('success', 'Ujian Berhasil Di Kerjakan');
        }

        return redirect('/ujian')->with('error', 'Anda Sudah Mengerjakan Ujian');
    }
}
