<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DownloadFileController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\KegiatanYangDisukaiController;
use App\Http\Controllers\User\PinjamRuanganController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RuanganControllerUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('admin')
    ->middleware('auth', 'admin')
    ->group(function () {
        Route::get('/', [DashboardAdminController::class, 'index'])
            ->name('dashboard_admin');
        Route::resource('kegiatan', KegiatanController::class);
        Route::resource('ruangan', RuanganController::class);
        Route::resource('peminjaman', PeminjamanController::class);
        Route::resource('manage-user', ManageUserController::class);
        Route::get('/surat/{id}', [DownloadFileController::class, 'download'])->name('download');
        Route::get('/lihat-data-surat-peminjaman/{id}', [DownloadFileController::class, 'lihat_pdf'])->name('lihat_pdf');
    });

Route::prefix('user')
    ->group(function () {
        Route::get('/', [DashboardUserController::class, 'dashboard_user'])
            ->name('dasboard_user');

        Route::get(
            '/pemilihan/kegiatan-yang-disukai',
            [KegiatanYangDisukaiController::class, 'opsi']
        )->name('memilih.kegiatan.user');
        Route::post(
            '/proses/kegiatan-yang-disukai',
            [KegiatanYangDisukaiController::class, 'proses_input_kegiatan_yang_disukai']
        )
            ->name('proses_input_kegiatan_yang_disukai');

        Route::get(
            '/list-ruangan',
            [RuanganControllerUser::class, 'list_ruangan_berdasarkan_metode_content_based']
        )->name('list-ruangan');

        Route::resource('profile', ProfileController::class);

        Route::post('/proses-pinjam-ruangan/{id}', [PinjamRuanganController::class, 'proses_pinjam_ruangan'])
            ->name('proses_pinjam_ruangan');

        Route::get('/peminjaman-ruangan', [PinjamRuanganController::class, 'data_peminjaman'])
            ->name('data_peminjaman_ruangan');

        Route::get('/bagian/upload-surat-peminjaman/{id}', [PinjamRuanganController::class, 'halaman_upload_surat_peminjman_ruangan'])->name('halaman_upload_surat_peminjman_ruangan');
        Route::put('/proses/upload-surat-peminjaman/{id}', [PinjamRuanganController::class, 'proses_upload_surat_peminjaman'])->name('proses_upload_surat_peminjaman_ruangan');
        Route::post('/proses-pengembalian/ruangan/{id}', [PinjamRuanganController::class, 'pengembalian_ruangan'])->name('pengembalian_ruangan');
        Route::post('/proses-cancel/ruangan/{id}', [PinjamRuanganController::class, 'cancel'])->name('cancel');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');