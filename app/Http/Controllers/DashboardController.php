<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CetakKtp;
use App\Models\RekamKtp;
use App\Models\IKD;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $data = [
            "title"                 => "Dashboard",
            "menuDashboard"         => "active",

            // ✅ HITUNG CETAK SELESAI HARI INI
            "operatorCetakHariIni"  => CetakKtp::where('status_cetak', 'Selesai')
                                                ->whereBetween('tanggal_selesai', [
                                                        now()->startOfDay(),
                                                        now()->endOfDay()
                                                    ])
                                                ->count(),

            // (kalau rekam mau sama, konsepnya IDENTIK)
            "operatorRekamHariIni"  => RekamKtp::whereDate('tanggal_rekam', $today)->count(),

            "ikdHariIni"  => IKD::whereDate('tanggal_ikd', $today)->count(),

        ];

        return view('dashboard', $data);
    }
}
