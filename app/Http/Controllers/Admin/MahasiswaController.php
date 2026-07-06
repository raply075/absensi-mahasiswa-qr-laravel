<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str; 
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    
    /**
     * Tampilkan daftar mahasiswa
     */
    public function index(Request $request)
{
    $query = Mahasiswa::with('kelas');

    if ($request->filled('search')) {

        $query->where(function ($q) use ($request) {

            $q->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('nim', 'like', '%' . $request->search . '%');

        });

    }

    $mahasiswa = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view(
        'admin.mahasiswa.index',
        compact('mahasiswa')
    );
}

    /**
     * Form tambah mahasiswa
     */
    public function create(): View
    {
        $kelas = Kelas::orderBy('nama')->get();

        return view('admin.mahasiswa.create', compact('kelas'));
    }

    /**
     * Simpan mahasiswa
     */
   public function store(StoreMahasiswaRequest $request): RedirectResponse
{
    $data = $request->validated();

    $data['qr_token'] = Str::uuid();

    Mahasiswa::create($data);

    return redirect()
        ->route('admin.mahasiswa.index')
        ->with('success', 'Data mahasiswa berhasil ditambahkan.');
}

    /**
     * Form edit mahasiswa
     */
    public function edit(Mahasiswa $mahasiswa): View
    {
        $kelas = Kelas::orderBy('nama')->get();

        return view('admin.mahasiswa.edit', compact('mahasiswa', 'kelas'));
    }

    /**
     * Update mahasiswa
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->update($request->validated());

        return redirect()
            ->route('admin.mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil diubah.');
    }

    /**
     * Hapus mahasiswa
     */
    public function destroy(Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->delete();

        return redirect()
            ->route('admin.mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil dihapus.');
    }

   public function qr(Mahasiswa $mahasiswa)
{
    if (!$mahasiswa->qr_token) {

        $mahasiswa->qr_token = (string) Str::uuid();
        $mahasiswa->save();

        $mahasiswa->refresh();
    }

    $renderer = new ImageRenderer(
        new RendererStyle(300),
        new SvgImageBackEnd()
    );

    $writer = new Writer($renderer);

    $qr = $writer->writeString($mahasiswa->qr_token);

    return view('admin.mahasiswa.qr', compact(
        'mahasiswa',
        'qr'
    ));
}
}