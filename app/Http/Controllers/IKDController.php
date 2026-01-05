<?php

namespace App\Http\Controllers;

use App\Models\Ikd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IKDController extends Controller
{
    // helper untuk menentukan path view & menu aktif
    private function viewPath()
    {
        if (Auth::user()->jabatan === 'Operator-Cetak') {
            return [
                'path' => 'operator-cetak.ikd.',
                'menu' => 'menuIKDOperatorCetak'
            ];
        } 

        // default Operator-Rekam
        return [
            'path' => 'operator-rekam.ikd.',
            'menu' => 'menuIKD'
        ];
    }

    public function index()
    {
        $view = $this->viewPath();

        return view($view['path'] . 'index', [
            'title' => 'Data IKD (Identitas Kependudukan Digital)',
            $view['menu'] => 'active',
            'ikd' => Ikd::with('user')
                    ->orderBy('tanggal_rekam', 'desc') // 🔥 TERBARU DI ATAS
                    ->get(),
        ]);
    }

    public function create()
    {
        $view = $this->viewPath();

        return view($view['path'] . 'create', [
            'title' => 'Tambah Data IKD',
            $view['menu'] => 'active',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ikd'    => 'required',
            'nik_ikd'     => 'required|digits:16|unique:ikd,nik_ikd',
            'tanggal_ikd' => 'required',
        ], [
            'nama_ikd.required'    => 'Nama wajib diisi',
            'nik_ikd.required'     => 'NIK wajib diisi',
            'nik_ikd.unique'       => 'NIK sudah digunakan',
            'nik_ikd.digits'       => 'NIK harus 16 digit',
            'tanggal_ikd.required' => 'Tanggal IKD wajib diisi',
        ]);

        Ikd::create([
            'nama_ikd'    => $request->nama_ikd,
            'nik_ikd'     => $request->nik_ikd,
            'tanggal_ikd' => $request->tanggal_ikd,
            'id_user'     => Auth::id(),
        ]);

        return redirect()->route('ikd')->with('success', 'Data IKD berhasil ditambahkan');
    }

    public function edit($id)
    {
        $view = $this->viewPath();

        return view($view['path'] . 'edit', [
            'title' => 'Edit Data IKD',
            $view['menu'] => 'active',
            'ikd' => Ikd::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ikd'    => 'required',
            'nik_ikd'     => 'required|digits:16|unique:ikd,nik_ikd,' . $id,
            'tanggal_ikd' => 'required',
        ]);

        $ikd = Ikd::findOrFail($id);
        $ikd->update([
            'nama_ikd'    => $request->nama_ikd,
            'nik_ikd'     => $request->nik_ikd,
            'tanggal_ikd' => $request->tanggal_ikd,
            'id_user'     => Auth::id(),
        ]);

        return redirect()->route('ikd')->with('success', 'Data IKD berhasil diupdate');
    }

    public function destroy($id)
    {
        Ikd::findOrFail($id)->delete();

        return redirect()->route('ikd')->with('success', 'Data IKD berhasil dihapus');
    }

    private function forbidAdmin()
    {
        if (auth()->user()->jabatan === 'Admin') {
            abort(403, 'Admin hanya memiliki akses lihat data');
        }
    }

}