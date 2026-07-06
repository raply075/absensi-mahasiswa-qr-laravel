<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Kelas;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class KelasController extends Controller
{
    /**
     * Menampilkan daftar kelas
     */
    public function index(): View
    {
        $kelas = Kelas::latest()->paginate(10);

        return view('admin.kelas.index', compact('kelas'));
    }

    // tampil form tambah kelas
    public function create(): View
    {
        return view('admin.kelas.create');
    }

    // simpan data kelas
    public function store(StoreKelasRequest $request): RedirectResponse
    {
        Kelas::create($request->validated());

        return redirect()
    ->route('admin.kelas.index')
    ->with('success', 'Data kelas berhasil ditambahkan.');
    }

//    edit kelas
    public function edit(Kelas $kelas): View
    {
        return view('admin.kelas.edit', [
            'kelas' => $kelas
        ]);
    }

//    update data kelas
    public function update(UpdateKelasRequest $request, Kelas $kelas): RedirectResponse
    {
        $kelas->update($request->validated());

       return redirect()
    ->route('admin.kelas.index')
    ->with('success', 'Data kelas berhasil diubah.');
    }

    // hapus data kelas
    public function destroy(Kelas $kelas): RedirectResponse
    {
        $kelas->delete();

        return redirect()
    ->route('admin.kelas.index')
    ->with('success', 'Data kelas berhasil dihapus.');
    }
}