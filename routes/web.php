<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index']);
// Route::get('/', function(){
//     return view('dashboard');
// });

Auth::routes([
    'verify' => true
]);

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
/// Route::get('post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// OWNER
Route::get('/admindashboard', [AdminController::class, 'dashboardadmin']);
Route::get('/editdaftarkelas', [AdminController::class, 'editdaftarkelas']);
Route::post('/tambahkelasbaru', [AdminController::class, 'tambahkelasbaru']);
Route::get('/editdaftarsiswa', [AdminController::class, 'editdaftarsiswa']);
Route::get('/editdaftarpengajar', [AdminController::class, 'editdaftarpengajar']);
Route::get('/editdetailkelas/{kelas}', [AdminController::class, 'editdetailkelas']);

//Pengajar
Route::get('/pengajardashboard', [PengajarController::class, 'dashboardpengajar'])->name('dashboardpengajar');
Route::get('/pengajarabsensi', [PengajarController::class, 'absensipengajar'])->name('absensipengajar');;
Route::get('/pengajardetailkelas/{kelas}/tambahpertemuan', [PengajarController::class, 'tambahpertemuanpengajar'])->name('tambah_pertemuan');
Route::get('/pengajardetailkelas/{kelas}', [PengajarController::class, 'detailkelaspengajar']);
Route::get('/pengajarjadwal', [PengajarController::class, 'jadwalpengajar']);
Route::get('absensipengajar', [PengajarController::class, 'absensipengajar']);
Route::get('/jadwalpengajar', [PengajarController::class, 'jadwalpengajar'])->name('jadwalpengajar');
Route::get('/raporpengajar', [PengajarController::class, 'raporpengajar'])->name('raporpengajar');
Route::get('/sertifikatpengajar', [PengajarController::class, 'sertifikatpengajar'])->name('sertifikatpengajar');

//Siswa
Route::get('/berandasiswa', [SiswaController::class, 'berandasiswa']);
Route::get('/dashboardsiswa', [SiswaController::class, 'dashboardsiswa']);
Route::get('/pembayaran', [SiswaController::class, 'pembayaran']);
Route::get('/rapor', [SiswaController::class, 'rapor']);
Route::get('/sertifikat', [SiswaController::class, 'sertifikat']);
Route::get('/kelas', [SiswaController::class, 'kelassaya']);
Route::get('/detailkelas/{kelas}', [SiswaController::class, 'detailkelas']);
Route::get('/siswa/detailkelas/{kelas}', [SiswaController::class, 'programkelas']);
Route::get('/editprofile', [SiswaController::class, 'editprofile']);

// User
Route::get('/formulirpendaftaran', [SiswaController::class, 'formulirpendaftaran']);
Route::post('/formulirpendaftaran', [SiswaController::class, 'kirimformulirpendaftaran']);
require __DIR__.'/auth.php';