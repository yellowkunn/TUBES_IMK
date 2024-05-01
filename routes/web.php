<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.formulir_pendaftaran');
})->middleware(['auth', 'verified'])->name('formulir_pendaftaran');

// siswa
Route::get('/dashboard/rapor/detail-rapor', function () {
    return view('siswa.detail_rapor');
});

Route::get('/dashboard/sertifikat', function () {
    return view('siswa.sertifikat');
});

// pengajar
Route::get('/dashboard/kelas/detail-kelasX', function () {
    return view('pengajar.detail_kelas');
});

Route::get('/dashboard/kelas/detail-kelasX/pertemuanX/absensi', function () {
    return view('pengajar.absensi_siswa');
});

Route::get('/dashboard/jadwal', function () {
    return view('pengajar.jadwal');
});


require __DIR__.'/auth.php';
