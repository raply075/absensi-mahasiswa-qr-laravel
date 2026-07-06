<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();

        $totalKelas = Kelas::count();

        $absensiHariIni = Absensi::whereDate(
            'tanggal',
            now()->toDateString()
        )->count();

        $totalAbsensi = Absensi::count();

        $hadir = Absensi::where('status', 'hadir')->count();

        $izin = Absensi::where('status', 'izin')->count();

        $sakit = Absensi::where('status', 'sakit')->count();

        $alpa = Absensi::where('status', 'alpa')->count();

       return view('admin.dashboard', compact(
    'totalMahasiswa',
    'totalKelas',
    'absensiHariIni',
    'totalAbsensi',
    'hadir',
    'izin',
    'sakit',
    'alpa'
));
    }
}