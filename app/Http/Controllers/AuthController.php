<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    // =====================
    // LOGIN PROSES
    // =====================
    public function loginProses(Request $request)
    {
        $request->validate([
            'nik'       => 'required|digits:16',
            'password'  => 'required|min:8'
        ], [
            'nik.required'       => 'Username wajib diisi',
            'nik.digits'         => 'Username wajib 16 angka',
            'password.required' => 'Password wajib diisi',
            'password.min'      => 'Password minimal 8 karakter',
        ]);

        // 🔍 Ambil user berdasarkan NIK
        $user = User::where('nik', $request->nik)->first();

        // ❌ Jika user tidak ditemukan
        if (!$user) {
            return back()->with('error', 'NIK atau Password salah!');
        }

        // 🚫 Jika akun NON-ACTIVE
        if ($user->status_user === 'Non-active') {
            return back()->with(
                'error',
                'Akun Anda tidak aktif, silakan hubungi admin'
            );
        }

        // ✅ Coba login
        if (Auth::attempt([
            'nik'      => $request->nik,
            'password' => $request->password
        ])) {

            // 🔐 Amankan session
            $request->session()->regenerate();

            return redirect()->route('dashboard')
                ->with('success', 'Anda berhasil login');
        }

        return back()->with('error', 'NIK atau Password salah!');
    }

    // =====================
    // LOGOUT
    // =====================
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda berhasil logout');
    }
}
