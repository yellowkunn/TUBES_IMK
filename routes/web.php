<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Pengajar;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');

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
Route::middleware(['role:admin', 'auth', 'verified'])->group(function () {
    // Route::get('/admindashboard', [AdminController::class, 'dashboardadmin'])->name('dashboardadmin');
    Route::get('/pengaturanruangan', [AdminController::class, 'pengaturanruangan'])->name('pengaturanruangan');

    Route::get('/kalenderpendidikan', [AdminController::class, 'kalenderpendidikan'])->name('kalenderpendidikan');
  
    Route::get('/editdaftarsiswa', [AdminController::class, 'editdaftarsiswa'])->name('editdaftarsiswa');
    
    Route::get('/editdaftarpengajar', [AdminController::class, 'editdaftarpengajar'])->name('editdaftarpengajar');
    Route::post('/tambahpengajarbaru', [AdminController::class, 'tambahpengajarbaru']);

    Route::post('/tambahkelasbaru', [AdminController::class, 'tambahkelasbaru']);
    Route::get('/editdetailkelas/{kelas}', [AdminController::class, 'editdetailkelas'])->name('editdetailkelas');
    Route::get('/editdaftarkelas', [AdminController::class, 'editdaftarkelas'])->name('editdaftarkelas');
    Route::post('/hapuskelas/{id}', [AdminController::class,'hapuskelas'])->name('kelas.hapus');
});

//Pengajar
Route::middleware(['role:pengajar', 'auth', 'verified'])->group(function () {
    // Route::get('/pengajardashboard', [PengajarController::class, 'dashboardpengajar'])->name('dashboardpengajar');
    Route::get('/tambahpertemuan/{kelas}', [PengajarController::class, 'tambahpertemuanpengajar'])->name('tambah_pertemuan');
    Route::get('/absensi/{kelas}', [PengajarController::class, 'absensi'])->name('absensi');
    Route::get('/pengajar/kelas', [PengajarController::class, 'kelaspengajar'])->name('pengajar.kelas');
    Route::get('/pengajardetailkelas/{kelas}', [PengajarController::class, 'detailkelaspengajar'])-> name('pengajar.kelas.detail');
    // Route::get('/pengajar/kelas/{kelas}/{pertemuan}', [PengajarController::class, 'detailpertemuanpengajar'])->name('pengajar.kelas.pertemuan');
    // Route::get('/pengajar/kelas/{kelas}/{pertemuan}/{latihan}', [PengajarController::class, 'daftarlatihanpengajar'])->name('pengajar.kelas.pertemuan.latihan');
    Route::get('/pengajarjadwal', [PengajarController::class, 'jadwalpengajar']);
    Route::get('absensipengajar', [PengajarController::class, 'absensipengajar']);
    Route::get('/jadwalpengajar', [PengajarController::class, 'jadwalpengajar'])->name('jadwalpengajar');
    Route::get('/raporpengajar', [PengajarController::class, 'raporpengajar'])->name('raporpengajar');
    Route::get('/sertifikatpengajar', [PengajarController::class, 'sertifikatpengajar'])->name('sertifikatpengajar');
    Route::post('/kirimtambahpertemuan', [PengajarController::class, 'kirimtambahpertemuan']);
    Route::get('/detail_pertemuan/{pertemuan}', [PengajarController::class, 'detail_pertemuan'])->name('detail_pertemuan');
});

//Siswa
Route::middleware(['role:siswa', 'auth', 'verified'])->group(function () {
    Route::get('/berandasiswa', [SiswaController::class, 'berandasiswa'])->name('berandasiswa');
    Route::get('/dashboardsiswa', [SiswaController::class, 'dashboardsiswa'])->name('dashboardsiswa');
    Route::get('/pembayaran', [SiswaController::class, 'pembayaran'])->name('pembayaran');
    Route::get('/rapor', [SiswaController::class, 'rapor'])->name('rapor');
    Route::get('/sertifikat', [SiswaController::class, 'sertifikat'])->name('sertifikat');
    Route::get('/kelas', [SiswaController::class, 'kelassaya'])->name('kelas');
    Route::get('/detailkelas/{kelas}', [SiswaController::class, 'detailkelas'])->name('detailkelas');
    Route::get('/siswa/detailkelas/{kelas}', [SiswaController::class, 'programkelas'])->name('programkelas');
    Route::get('/editprofile', [SiswaController::class, 'editprofile'])->name('editprofile');
});

// User
Route::get('/formulirpendaftaran', [SiswaController::class, 'formulirpendaftaran'])->name('formulirpendaftaran');
Route::post('/formulirpendaftaran', [SiswaController::class, 'kirimformulirpendaftaran']);
require __DIR__.'/auth.php';

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});