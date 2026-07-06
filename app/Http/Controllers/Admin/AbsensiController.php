<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;


class AbsensiController extends Controller
{   

    public function excel()
{
    return Excel::download(
        new AbsensiExport,
        'laporan-absensi.xlsx'
    );
}

    public function pdf()
{
    $absensi = Absensi::with('mahasiswa.kelas')
        ->orderBy('tanggal', 'desc')
        ->get();

    $pdf = Pdf::loadView(
        'admin.absensi.pdf',
        compact('absensi')
    );

    return $pdf->download('laporan-absensi.pdf');
}    

    public function index(Request $request): View
{
    $query = Absensi::with('mahasiswa.kelas');

    // Filter tanggal
    if ($request->filled('tanggal')) {
        $query->whereDate('tanggal', $request->tanggal);
    }

    // Filter kelas
    if ($request->filled('kelas_id')) {
        $query->whereHas('mahasiswa', function ($q) use ($request) {
            $q->where('kelas_id', $request->kelas_id);
        });
    }

    // Filter status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $absensi = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    $kelas = \App\Models\Kelas::orderBy('nama')->get();

    return view('admin.absensi.index', compact(
        'absensi',
        'kelas'
    ));
}

    public function create(): View
    {
        $mahasiswa = Mahasiswa::orderBy('nama')->get();

        return view('admin.absensi.create', compact('mahasiswa'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'status' => 'required',
        ]);

        Absensi::create($request->all());

        return redirect()
            ->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function edit(Absensi $absensi): View
    {
        $mahasiswa = Mahasiswa::orderBy('nama')->get();

        return view('admin.absensi.edit', compact(
            'absensi',
            'mahasiswa'
        ));
    }

    public function update(
        Request $request,
        Absensi $absensi
    ): RedirectResponse {

        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'status' => 'required',
        ]);

        $absensi->update($request->all());

        return redirect()
            ->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil diubah.');
    }

    public function destroy(
        Absensi $absensi
    ): RedirectResponse {

        $absensi->delete();

        return redirect()
            ->route('admin.absensi.index')
            ->with('success', 'Data absensi berhasil dihapus.');
    }
    public function scan(Request $request)
{
    $mahasiswa = Mahasiswa::where(
        'qr_token',
        $request->token
    )->first();

    if (!$mahasiswa) {

        return back()->with(
            'error',
            'QR tidak ditemukan.'
        );
    }

    $cek = Absensi::where(
            'mahasiswa_id',
            $mahasiswa->id
        )
        ->whereDate(
            'tanggal',
            Carbon::today()
        )
        ->first();

    if ($cek) {

        return back()->with(
            'error',
            'Mahasiswa sudah absen hari ini.'
        );
    }

    Absensi::create([
        'mahasiswa_id' => $mahasiswa->id,
        'tanggal' => now()->toDateString(),
        'jam' => now()->format('H:i:s'),
        'status' => 'hadir',
    ]);

    return back()->with(
        'success',
        $mahasiswa->nama .
        ' berhasil absen.'
    );
}
}