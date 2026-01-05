<?php

namespace App\Http\Controllers;

use App\Models\RekamKtp;
use App\Models\Kelurahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
 
class RekamController extends Controller
{
    public function index(){
        $data = array(
            'title'             => 'Data Rekam KTP',
            'menuOperatorRekam' => 'active',
            'rekam'             => RekamKtp::with('user', 'kelurahan')->get(),
        );
        return view('operator-rekam/rekam-ktp/index', $data);
    }

    public function create(){
        $data = array(
            'title'             => 'Tambah Data Rekam KTP',
            'menuOperatorRekam' => 'active',
            'kelurahan'         => Kelurahan::orderBy('nama_kelurahan')->get(),
        );
        return view('operator-rekam/rekam-ktp/create', $data);
    }

    public function store(Request $request){
        // Validasi input
        $request->validate([
            'nama_rekam'     => 'required',
            'nik_rekam'      => 'required|digits:16|unique:rekam_ktp,nik_rekam', 
            'alamat'         => 'nullable',
            'id_lurah'       => 'required|exists:kelurahan,id',
            'rt'             => 'required',
            'tanggal_rekam'  => 'required',

        ], [
            'nama_rekam.required'    => 'Nama wajib diisi', 
            'nik_rekam.required'     => 'NIK wajib diisi',
            'nik_rekam.unique'       => 'NIK sudah digunakan',
            'nik_rekam.digits'       => 'NIK harus 16 digit',
            'id_lurah.required'      => 'Kelurahan wajib diisi',
            'rt.required'            => 'RT wajib diisi',
            'tanggal_rekam.required' => 'Tanggal Rekam wajib diisi',
        ]);

        // Simpan data user baru
        $rekam = new Rekamktp();
        $rekam->id_user        = Auth::id(); // 🔥 INI KUNCINYA
        $rekam->nama_rekam     = $request->nama_rekam;
        $rekam->nik_rekam      = $request->nik_rekam;
        $rekam->alamat         = $request->alamat ?? '-';
        $rekam->id_lurah       = $request->id_lurah;
        $rekam->rt             = $request->rt;
        $rekam->tanggal_rekam  = $request->tanggal_rekam;
        $rekam->save();

        return redirect()->route('rekam')->with('success', 'Data Rekam KTP Berhasil Di Tambahkan');
    }

    public function edit($id){
        $data = array(
            'title'             => 'Edit Data Rekam kTP',
            'menuOperatorRekam' => 'active',
            'rekam'             => RekamKtp::findOrFail($id),
            'kelurahan'         => Kelurahan::orderBy('nama_kelurahan')->get(),

        );
        return view('operator-rekam/rekam-ktp/edit', $data);
    }

    public function update(Request $request, $id){
        // Validasi input
        $request->validate([ 
            'nama_rekam'     => 'required',
            'nik_rekam'      => 'required|digits:16|unique:rekam_ktp,nik_rekam,' . $id,
            'alamat'         => 'nullable',
            'id_lurah'       => 'required|exists:kelurahan,id',
            'rt'             => 'required',
            'tanggal_rekam'  => 'required',
        ], [
            'nama_rekam.required'    => 'Nama wajib diisi', 
            'nik_rekam.required'     => 'NIK wajib diisi',
            'nik_rekam.unique'       => 'NIK sudah digunakan',
            'nik_rekam.digits'       => 'NIK harus 16 digit',
            'id_lurah.required'      => 'Kelurahan wajib diisi',
            'rt.required'            => 'RT wajib diisi',
            'tanggal_rekam.required' => 'Tanggal Rekam wajib diisi',
        ]);

        // Update data user 
        $rekam = Rekamktp::findOrFail($id);
        $rekam->id_user        = Auth::id(); // 🔥 INI KUNCINYA
        $rekam->nama_rekam     = $request->nama_rekam;
        $rekam->nik_rekam      = $request->nik_rekam;
        $rekam->alamat         = $request->alamat;
        $rekam->id_lurah       = $request->id_lurah;
        $rekam->rt             = $request->rt;
        $rekam->tanggal_rekam  = $request->tanggal_rekam;
        $rekam->save();

        return redirect()->route('rekam')->with('success', 'Data Rekam KTP Berhasil Di Update');
    }

    public function destroy($id){
        $rekam = RekamKtp::findOrFail($id);
        $rekam->delete();

        return redirect()->route('rekam')->with('success', 'Data Rekam KTP Berhasil Di Hapus');
    }
}
