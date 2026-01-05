<?php

namespace App\Http\Controllers;
 
use App\Models\CetakKtp;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
 
class CetakController extends Controller
{
    /* =====================
     * DATA PROSES
     * ===================== */
    public function index(){
        $data = array(
            'title'             => 'Pencatatan Pengambilan Cetak KTP',
            'menuOperatorCetak' => 'active',
            'cetak'             => CetakKtp::with(['user', 'kelurahan'])
                                    ->where('status_cetak', 'Proses')
                                    ->orderBy('tanggal_pao', 'desc') // 🔥 TERBARU DI ATAS
                                    ->get(),
        );
        return view('operator-cetak/cetak-ktp/index', $data);
    }

    /* =====================
     * RIWAYAT SELESAI
     * ===================== */
    public function riwayat(){
        $data = [
            'title'               => 'Riwayat Pencatatan Pengambilan Cetak KTP',
            'menuRiwayatCetak'    => 'active',
            'cetak'               => CetakKtp::with(['user', 'kelurahan'])
                                      ->where('status_cetak', 'Selesai')
                                      ->orderBy('tanggal_ambil', 'desc') // 🔥 TERBARU DI ATAS
                                      ->get(),
        ];

        return view('operator-cetak/riwayat-ktp/index', $data);
    }

    /* =====================
     * CREATE
     * ===================== */
    public function create(){
        $data = array(
            'title'             => 'Tambah Data Cetak KTP',
            'menuOperatorCetak' => 'active',
            'kelurahan'         => Kelurahan::orderBy('nama_kelurahan')->get(),
        );
        return view('operator-cetak/cetak-ktp/create', $data);
    }

    /* =====================
     * STORE
     * ===================== */
    public function store(Request $request){
        // Validasi input
        $request->validate([
            'kode_pao'       => 'required|unique:cetak_ktp,kode_pao',
            'nik_cetak'      => 'required|digits:16',
            'nama_cetak'     => 'required',
            'id_lurah'       => 'required|exists:kelurahan,id',
            'rt'             => 'required',
            'ket_cetak'      => 'required', 
            'status_cetak'   => 'required',
            'tanggal_pao'    => 'required',
            'tanggal_ambil'  => 'nullable',
            'tanda_terima'   => 'nullable',                              
            'keterangan'     => 'nullable',

        ], [
            'kode_pao.required'      => 'Kode PAO wajib diisi',
            'kode_pao.unique'        => 'Kode PAO sudah digunakan', 
            'nik_cetak.required'     => 'NIK wajib diisi',
            'nik_cetak.digits'       => 'NIK harus 16 digit',
            'nama_cetak.required'    => 'Nama wajib diisi', 
            'id_lurah.required'      => 'Kelurahan wajib diisi',
            'rt.required'            => 'RT wajib diisi',
            'ket_cetak.required'     => 'Keterangan Cetak wajib diisi', 
            'status_cetak.required'  => 'Status Cetak wajib diisi',            
            'tanggal_pao.required'   => 'Tanggal Penerimaan PAO wajib diisi',
        ]);

        // Simpan data cetak ktp baru
        $cetak = new Cetakktp();
        $cetak->id_user      = Auth::id(); // 🔥 INI KUNCINYA
        $cetak->kode_pao     = $request->kode_pao;
        $cetak->nik_cetak    = $request->nik_cetak;
        $cetak->nama_cetak   = $request->nama_cetak;
        $cetak->id_lurah     = $request->id_lurah;
        $cetak->rt           = $request->rt;
        $cetak->ket_cetak    = $request->ket_cetak;
        $cetak->status_cetak = $request->status_cetak;
        $cetak->tanggal_pao  = $request->tanggal_pao;
        $cetak->tanggal_ambil= $request->tanggal_ambil; //di ikutkan karena waktu edit selesai langsung ambil bisa langsung tanggalnya di setting
        $cetak->tanda_terima = $request->tanda_terima ?? '-';
        $cetak->keterangan   = $request->keterangan ?? '-';

        // kalau langsung selesai
        if ($request->status_cetak === 'Selesai') {
            $cetak->tanggal_selesai = Carbon::now('Asia/Makassar');
        }

        $cetak->save();
        
        return redirect()->route('cetak')->with('success', 'Data Cetak KTP Berhasil Di Tambahkan');
    }

    /* =====================
     * EDIT
     * ===================== */
    public function edit(Request $request, $id){

        $from = $request->get('from', 'Proses'); // default proses

        $data = [
            'title'         => 'Edit Data Cetak KTP',
            'cetak'         => CetakKtp::findOrFail($id),
            'kelurahan'     => Kelurahan::orderBy('nama_kelurahan')->get(),


            // sidebar logic
            'menuOperatorCetak'   => $from === 'Proses' ? 'active' : '',
            'menuRiwayatCetak'    => $from === 'riwayat' ? 'active' : '',

            // untuk redirect setelah update
            'redirect_to' => $from
        ];

        return view('operator-cetak/cetak-ktp/edit', $data);
    }

    /* =====================
     * UPDATE (LOGIKA UTAMA)
     * ===================== */
    public function update(Request $request, $id){
        $request->validate([
            'kode_pao'       => 'required|unique:cetak_ktp,kode_pao,'.$id,
            'nik_cetak'      => 'required|digits:16',
            'nama_cetak'     => 'required',
            'id_lurah'       => 'required|exists:kelurahan,id',
            'rt'             => 'required',
            'ket_cetak'      => 'required', 
            'status_cetak'   => 'required',
            'tanggal_pao'    => 'required',
            'tanggal_ambil'  => 'nullable',
            'tanda_terima'   => 'nullable',                              
            'keterangan'     => 'nullable',

        ], [
            'kode_pao.required'      => 'Kode PAO wajib diisi',
            'kode_pao.unique'        => 'Kode PAO sudah digunakan', 
            'nik_cetak.required'     => 'NIK wajib diisi',
            'nik_cetak.digits'       => 'NIK harus 16 digit',
            'nama_cetak.required'    => 'Nama wajib diisi', 
            'id_lurah.required'      => 'Kelurahan wajib diisi',
            'rt.required'            => 'RT wajib diisi',
            'ket_cetak.required'     => 'Keterangan Cetak wajib diisi', 
            'status_cetak.required'  => 'Status Cetak wajib diisi',            
            'tanggal_pao.required'   => 'Tanggal Penerimaan PAO wajib diisi',
        ]);

        // Update Data User
        $cetak = CetakKtp::findOrFail($id);
        $statusLama = $cetak->status_cetak;

        //update field
        $cetak->id_user      = Auth::id(); // 🔥 INI KUNCINYA
        $cetak->kode_pao     = $request->kode_pao;
        $cetak->nik_cetak    = $request->nik_cetak;
        $cetak->nama_cetak   = $request->nama_cetak;
        $cetak->id_lurah     = $request->id_lurah;
        $cetak->rt           = $request->rt;
        $cetak->ket_cetak    = $request->ket_cetak;
        $cetak->status_cetak = $request->status_cetak;
        $cetak->tanggal_pao  = $request->tanggal_pao;
        $cetak->tanggal_ambil= $request->tanggal_ambil;
        $cetak->tanda_terima = $request->tanda_terima ?? '-';
        $cetak->keterangan   = $request->keterangan ?? '-';

        /* ===== LOGIKA STATUS ===== */
        if ($statusLama !== 'Selesai' && $request->status_cetak === 'Selesai') {
            // proses → selesai
            $cetak->tanggal_selesai = Carbon::now('Asia/Makassar');
        }

        if ($statusLama === 'Selesai' && $request->status_cetak === 'Proses') {
            // selesai → proses
            $cetak->tanggal_selesai = null;
        }

        $cetak->save();

        // redirect sesuai asal
        if ($request->redirect_to === 'riwayat') {
            return redirect()->route('cetakRiwayat')
                ->with('success', 'Data berhasil diupdate');
        }

        return redirect()->route('cetak')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id){
        $cetak = CetakKtp::findOrFail($id);
        $cetak->delete();

        return redirect()->route('cetak')->with('success', 'Data Cetak KTP Berhasil Di Hapus');
    }

    // untuk pengecekan admin
    // private function isAdmin()
    // {
    //     return auth()->user()->jabatan === 'Admin';
    // }
}
