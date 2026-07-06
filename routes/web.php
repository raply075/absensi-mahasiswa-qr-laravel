<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\AbsensiController;


Route::get('/', function () {
    return view('welcome');
    });

Route::get('/scan', function () {
    return view('scan');
});

Route::post('/scan', [AbsensiController::class, 'scan'])
    ->name('scan.absensi');
    
    // Redirect jika ada yang mengakses /dashboard secara langsung
Route::middleware(['auth'])->get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('mahasiswa.dashboard');
})->name('dashboard');

Route::get(
    'absensi/excel',
    [AbsensiController::class, 'excel']
)->name('absensi.excel');

// ===================== ADMIN =====================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('kelas', KelasController::class);

        Route::resource('mahasiswa', MahasiswaController::class);

        Route::get(
            'mahasiswa/{mahasiswa}/qr',
            [MahasiswaController::class, 'qr']
        )->name('mahasiswa.qr');

        Route::get(
            'absensi/pdf',
            [AbsensiController::class, 'pdf']
        )->name('absensi.pdf');

        Route::get(
            'absensi/excel',
            [AbsensiController::class, 'excel']
        )->name('absensi.excel');

        Route::resource('absensi', AbsensiController::class);

    });

// ===================== MAHASISWA =====================
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->group(function () {

    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])
        ->name('mahasiswa.dashboard');

});

// ===================== PROFILE =====================
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';