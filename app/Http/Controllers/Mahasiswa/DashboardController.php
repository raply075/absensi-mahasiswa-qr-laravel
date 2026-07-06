<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $mahasiswa = Mahasiswa::where('email', $user->email)
            ->with('kelas')
            ->first();

        if (!$mahasiswa) {
            abort(404, 'Data mahasiswa tidak ditemukan.');
        }

        $hadir = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->where('status', 'hadir')
            ->count();

        $izin = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->where('status', 'izin')
            ->count();

        $sakit = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->where('status', 'sakit')
            ->count();

        $alpa = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->where('status', 'alpa')
            ->count();

        $riwayat = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->latest()
            ->take(10)
            ->get();

        return view('mahasiswa.dashboard', compact(
            'mahasiswa',
            'hadir',
            'izin',
            'sakit',
            'alpa',
            'riwayat'
        ));
    }
}