<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Admin;
use App\Models\Ormawa;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function post_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:15',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Pastikan email dan password terisi dengan benar!');
            return redirect()->back();
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Alert::success('Login Berhasil', 'Selamat datang, Admin!');
            return redirect()->route('admin.dashboard');
        } elseif (Auth::guard('ormawa')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('ormawa')->user();

            if (!$user->id_organisasi) {
                Auth::guard('ormawa')->logout();
                Alert::error('Login Gagal!', 'ID organisasi tidak valid.');
                return redirect()->back();
            }

            session(['id_organisasi' => $user->id_organisasi]);

            Alert::success('Login Berhasil', "Selamat datang, Admin Ormawa!");
            return redirect()->route('ormawa.dashboard');
        } elseif (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Alert::success('Login Berhasil', 'Selamat datang di Ormawa Polbeng!');
            return redirect()->route('user.index');
        } else {
            Alert::error('Login Gagal!', 'Email atau password tidak valid!');
            return redirect()->back();
        }
    }

    public function admin_logout() {
        Auth::guard('admin')->logout();
        toast('Berhasil logout!', 'success');
        return redirect('/');
    }

    public function ormawa_logout() {
        Auth::guard('ormawa')->logout();
        toast('Berhasil logout!', 'success');
        return redirect('/');
    }

    public function user_logout() {
        Auth::guard('user')->logout();
        toast('Berhasil logout!', 'success');
        return redirect('/');
    }

    public function register()
    {
        return view('register');
    }

    public function post_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:15',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            Alert::success('Berhasil!', 'Akun baru berhasil dibuat, silahkan melakukan login');
            return redirect('/login');
        } else {
            Alert::error('Gagal!', 'Akun gagal dibuat, silahkan coba lagi!');
            return redirect()->back();
        }
    }
}
