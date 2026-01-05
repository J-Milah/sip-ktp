<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = array(
            'title'         => 'Data User',
            'menuAdminUser' => 'active',
            'user'          => User::orderBy ('jabatan', 'ASC')->get(),
        );
        return view('admin/user/index', $data);
    }

    public function create(){
        $data = array(
            'title'         => 'Tambah Data User',
            'menuAdminUser' => 'active',
        );
        return view('admin/user/create', $data);
    }

    public function store(Request $request){
        // Validasi input
        $request->validate([
            'nama'        => 'required',
            'nik'         => 'required|unique:users,nik|digits:16',
            'jabatan'     => 'required',
            'password'    => 'required|confirmed|min:8',
            'status_user' => 'required',
        ], [
            'nama.required'     => 'Nama wajib diisi', 
            'nik.required'      => 'NIK wajib diisi',
            'nik.unique'        => 'NIK sudah digunakan',
            'nik.digits'        => 'NIK harus 16 digit',
            'jabatan.required'  => 'Jabatan wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.confirmed'=> 'Konfirmasi password tidak sesuai',
            'password.min'      => 'Password minimal 8 karakter',
        ]);

        // Simpan data user baru
        $user = new User();
        $user->nama        = $request->nama;
        $user->nik         = $request->nik;
        $user->jabatan     = $request->jabatan;
        $user->password    = Hash::make($request->password);
        $user->status_user = $request->status_user;
        $user->save();

        return redirect()->route('user')->with('success', 'Data user berhasil ditambahkan');
    }

    public function edit($id){
        $data = array(
            'title'         => 'Edit Data User',
            'menuAdminUser' => 'active',
            'user'          => User::findOrFail($id),
        );
        return view('admin/user/edit', $data);
    }

    public function update(Request $request, $id){
        // Validasi input
        $request->validate([
            'nama'        => 'required',
            'nik'         => 'required|digits:16|unique:users,nik,'.$id, //.$id berarti ketika edit pasti bisa, tidak ada tulisan niknya sudah digunakan
            'jabatan'     => 'required',
            'password'    => 'nullable|confirmed|min:8', //nullable berarti boleh di kosongkan
            'status_user' => 'required',
        ], [
            'nama.required'     => 'Nama wajib diisi', 
            'nik.required'      => 'NIK wajib diisi',
            'nik.unique'        => 'NIK sudah digunakan',
            'nik.digits'        => 'NIK harus 16 digit',
            'jabatan.required'  => 'Jabatan wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.confirmed'=> 'Konfirmasi password tidak sesuai',
            'password.min'      => 'Password minimal 8 karakter',
        ]);

        // Update data user 
        $user = User::findOrFail($id);
        $user->nama        = $request->nama;
        $user->nik         = $request->nik;
        $user->jabatan     = $request->jabatan;
        $user->status_user = $request->status_user;
        
        // ✅ password hanya diubah jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save(); 

        return redirect()->route('user')->with('success', 'Data user berhasil diupdate');
    }

}
