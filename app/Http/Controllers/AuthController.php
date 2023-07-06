<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\User;
use App\Models\Nilai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function login_action(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (auth()->user()->roles == 'admin') {
                return redirect('/dashboard');
            } else if (auth()->user()->roles == 'user') {
                if (auth()->user()->status_verifikasi == true) {
                    return redirect('/home');
                }
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('pesan-danger', 'Akun Anda Belum Di Verifikasi');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('pesan-danger', 'Username atau Password anda salah');
            }
        }
        return back()->with('pesan-danger', 'Username atau Password anda salah');
    }

    public function register_action(RegisterRequest $request)
    {
        $user = new User();

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->jk = $request->jk;
        
        $foto = $request->file('foto');
        $destinationPath = 'images/';
        $profileImage = Str::slug($request->nama_profesi) . "." . $foto->getClientOriginalExtension();
        $foto->move($destinationPath, $profileImage);

        $user->foto = $profileImage;
        $user->roles = 'user';
        $user->status_verifikasi = false;
        $user->save();

        return redirect('/')->with('pesan-berhasil', 'Akun Berhasil Di Buat, Tunggu Akun Anda Di Verifikasi');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function mahasiswa()
    {
        $mahasiswa = User::where('roles', 'user')->get();
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function mahasiswa_verifikasi($id)
    {
        $mahasiswa = User::where('id', $id)->first();

        $mahasiswa->status_verifikasi = true;
        $mahasiswa->update();

        return redirect('/mahasiswa');
    }

    public function dashboard_mahasiswa()
    {
        $user = Auth::user();
        return view('mahasiswa.dashboard', compact('user'));
    }

    public function ujian_mahasiswa()
    {
        $admin = User::where('roles', 'admin')->first();
        $status = $admin->admin_start;

        return view('mahasiswa.ujian.index', compact('status'));
    }

    public function soal_mahasiswa()
    {
        $user = Auth::user();
        $nilai = Nilai::where('user_id', $user->id)->get();
        if ($nilai->isEmpty()) {
            $soal = Soal::get();

            return view('mahasiswa.ujian.soal', compact('soal'));
        }

        return redirect('/ujian')->with('error', 'Anda Sudah Mengerjakan Ujian');
    }

    public function nilai()
    {
        $user = Auth::user();

        return view('mahasiswa.nilai.index', compact('user'));
    }
}
