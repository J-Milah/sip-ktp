<?php

namespace App\Http\Controllers;

use App\Models\CetakKtp;
use App\Models\RekamKtp;
use Illuminate\Http\Request;

class CetakRekamController extends Controller 
{
    public function viewcetak(){
        $data = array(
            'title'             => 'Riwayat Cetak KTP',
            'menuViewCetak'     => 'active',
            'viewcetak'          => CetakKtp::where('status_cetak', 'Selesai')->get(),
        );
        return view('admin/viewcetakrekam/indexcetak', $data);
    }

    public function viewrekam(){
        $data = array(
            'title'             => 'Riwayat Rekam KTP',
            'menuViewRekam'     => 'active',
            'viewrekam'          => Rekamktp::get(),
        );
        return view('admin/viewcetakrekam/indexrekam', $data);
    }
}
