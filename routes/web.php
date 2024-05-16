<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('beranda');
});

Auth::routes([
    'verify' => true
]);


Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
// Route::get('post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// OWNER
Route::get('/admindashboard', [AdminController::class, 'dashboardadmin']);
Route::get('/editdaftarkelas', [AdminController::class, 'editdaftarkelas']);
Route::get('/editdaftarsiswa', [AdminController::class, 'editdaftarsiswa']);
Route::get('/editdaftarpengajar', [AdminController::class, 'editdaftarpengajar']);

//Pengajar
Route::get('/pengajardashboard', [PengajarController::class, 'dashboardpengajar']);
Route::get('/pengajarabsensi', [PengajarController::class, 'absensipengajar']);
Route::get('/pengajardetailkelas', [PengajarController::class, 'detailkelaspengajar']);
Route::get('/pengajarjadwal', [PengajarController::class, 'jadwalpengajar']);

//Siswa
Route::get('/siswadashboard', [SiswaController::class, 'dashboardsiswa']);
require __DIR__.'/auth.php';