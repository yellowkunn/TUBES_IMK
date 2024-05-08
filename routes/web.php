<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'index']);

// Route::get('/', function()
// {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/kelas/detail', function()
{
    return view('detail_tawaran_kelas');
});

// siswa
Route::get('/user/formulir-pendaftaran', function () {
    return view('user.formulir_pendaftaran');
});

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


// owner
Route::get('/dashboardAdmin', function()
{
    return view('owner.dashboard');
});

Route::get('/dashboard/tahun-ajaran/siswa', function () {
    return view('owner.daftar_siswa');
});

Route::get('/dashboard/pengajar', function () {
    return view('owner.daftar_pengajar');
});

Route::get('/dashboard/kelas', function () {
    return view('owner.daftar_kelas');
});


require __DIR__.'/auth.php';