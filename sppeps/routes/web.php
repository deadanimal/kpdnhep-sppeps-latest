<?php

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

use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasanSelesaiController;
use App\Http\Controllers\BorangPermohonan;
use App\Http\Controllers\SenaraiHitamController;
use App\Http\Controllers\KategorifaqController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PengumumanController;
// Route::get('/dashboard', function () {
//     return view('pemohon.dashboard');
// })->middleware(['auth'])->name('dashboard');\


require __DIR__.'/auth.php';

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource('/permohonan', PermohonanController::class);

Route::resource('/tugasan-selesai', TugasanSelesaiController::class);

Route::post('/cari', [PermohonanController::class, 'cari']);

Route::post('/cari-tugasan-selesai', [TugasanSelesaiController::class, 'cari']);

Route::post('/borang', [BorangPermohonan::class, 'borang']);

Route::resource('/senarai-hitam', SenaraiHitamController::class);

Route::get('/tambah-senarai-hitam', [SenaraiHitamController::class, 'senaraiDiluluskan']);

Route::get('/cari-pemohon', [SenaraiHitamController::class, 'cariSenaraiDiluluskan']);



//auth
Route::get('/login_', function () {
    return view('auth.login_');
});

Route::get('/lupa-kata-laluan', function () {
    return view('auth.forgot-password_');
});

Route::get('/register_', function () {
    return view('auth.register_');
});

Route::get('/semak-ic', function () {
    return view('auth.semakan-kad-pengenalan');
});

Route::get('/profil', function () {
    return view('auth.profile_');
});

Route::get('/profil-pegawai', function () {
    return view('auth.profil-pegawai');
});

Route::get('/kemaskini-profil', function () {
    return view('auth.profile-update_');
});

Route::get('/change-password', function () {
    return view('auth.change-password');
});


Route::get('/', function () {
    return view('global.landing-page');
});

Route::get('/arkib-bergambar', function () {
    return view('global.arkib-bergambar');
});

Route::get('/arkib-bergambar-senarai', function () {
    return view('global.arkib-bergambar-senarai');
});

Route::get('/arkib-bergambar-info', function () {
    return view('global.arkib-bergambar-info');
});

Route::get('/arkib-dokumen', function () {
    return view('global.arkib-dokumen');
});

Route::get('/arkib-dokumen-senarai', function () {
    return view('global.arkib-dokumen-senarai');
});

Route::get('/faq', function () {
    return view('global.faq');
});

Route::get('/semakan-status-eps', function () {
    return view('global.semakan-status-eps');
});


//pemohon
Route::get('/dashboard-pemohon', function () {
    return view('pemohon.dashboard');
});

Route::get('/permohonan-baru', function () {
    return view('pemohon.permohonan-baru');
});

Route::get('/permohonan-pembaharuan', function () {
    return view('pemohon.permohonan-pembaharuan');
});

Route::get('/permohonan-pendua', function () {
    return view('pemohon.permohonan-pendua');
});

Route::get('/permohonan-rayuan', function () {
    return view('pemohon.permohonan-rayuan');
});

Route::get('/status-permohonan', function () {
    return view('pemohon.status-permohonan');
});


//pdrm
Route::get('/pdrm-tugasan-baru', function () {
    return view('pegawai.pdrm.pdrm-tugasan-baru');
});

Route::get('/pdrm-maklumat-pemohon', function () {
    return view('pegawai.pdrm.pdrm-maklumat-pemohon');
});

Route::get('/pdrm-tugasan-selesai', function () {
    return view('pegawai.pdrm.pdrm-tugasan-selesai');
});


//pegawai negeri
Route::get('/negeri-tugasan-baru', function () {
    return view('pegawai.negeri.negeri-tugasan-baru');
});

Route::get('/negeri-maklumat-pemohon', function () {
    return view('pegawai.negeri.negeri-maklumat-pemohon');
});

Route::get('/negeri-tugasan-selesai', function () {
    return view('pegawai.negeri.negeri-tugasan-selesai');
});

Route::get('/negeri-bayaran-permohonan', function () {
    return view('pegawai.negeri.negeri-bayaran-permohonan');
});


//pegawai hq

Route::get('/hq-tugasan-baru', function () {
    return view('pegawai.hq.hq-tugasan-baru');
});

Route::get('/hq-maklumat-pemohon', function () {
    return view('pegawai.hq.hq-maklumat-pemohon');
});

Route::get('/hq-maklumat-pemohon-rayuan-pendua', function () {
    return view('pegawai.hq.hq-maklumat-pemohon-rayuan-pendua');
});

Route::get('/hq-disemak-pdrm', function () {
    return view('pegawai.hq.hq-disemak-pdrm');
});

Route::get('/hq-tugasan-selesai', function () {
    return view('pegawai.hq.hq-tugasan-selesai');
});

Route::get('/hq-senarai-hitam', function () {
    return view('pegawai.hq.hq-senarai-hitam');
});

Route::get('/hq-tambah-senarai-hitam', function () {
    return view('pegawai.hq.hq-tambah-senarai-hitam');
});


//pegawai penyokong

Route::get('/penyokong-tugasan-baru', function () {
    return view('pegawai.penyokong.penyokong-tugasan-baru');
});

Route::get('/penyokong-maklumat-pemohon', function () {
    return view('pegawai.penyokong.penyokong-maklumat-pemohon');
});

Route::get('/penyokong-tugasan-selesai', function () {
    return view('pegawai.penyokong.penyokong-tugasan-selesai');
});

//pegawai pelulus

Route::get('/pelulus-tugasan-baru', function () {
    return view('pegawai.pelulus.pelulus-tugasan-baru');
});

Route::get('/pelulus-maklumat-pemohon', function () {
    return view('pegawai.pelulus.pelulus-maklumat-pemohon');
});

Route::get('/pelulus-tugasan-selesai', function () {
    return view('pegawai.pelulus.pelulus-tugasan-selesai');
});


// laporan Statistik

Route::get('/peratusan-kelulusan-permit', function () {
    return view('laporan-statistik.peratusan-kelulusan-permit');
});

Route::get('/peratusan-permit-ditolak', function () {
    return view('laporan-statistik.peratusan-permit-ditolak');
});

Route::get('/laporan-sejarah-permohonan', function () {
    return view('laporan-statistik.laporan-sejarah-permohonan');
});

Route::get('/laporan-senarai-hitam', function () {
    return view('laporan-statistik.laporan-senarai-hitam');
});

Route::get('/statistik-pemegang-permit', function () {
    return view('laporan-statistik.statistik-pemegang-permit');
});

Route::get('/statistik-kutipan-fi', function () {
    return view('laporan-statistik.statistik-kutipan-fi');
});


//admin hq

Route::get('/pengurusan-data', function () {
    return view('pegawai.admin-hq.pengurusan-data');
});

Route::get('/kemaskini-maklumat-pemohon', function () {
    return view('pegawai.admin-hq.kemaskini-maklumat-pemohon');
});

Route::get('/peranan-pegawai', function () {
    return view('pegawai.admin-hq.peranan-pegawai');
});

Route::get('/tambah-peranan-pegawai', function () {
    return view('pegawai.admin-hq.tambah-peranan-pegawai');
});

Route::get('/tambah-peranan-pegawai-2', function () {
    return view('pegawai.admin-hq.tambah-peranan-pegawai-2');
});

Route::get('/tetapan-arkib-bergambar', function () {
    return view('pegawai.admin-hq.tetapan-arkib-bergambar');
});

Route::get('/tetapan-arkib-bergambar-senarai', function () {
    return view('pegawai.admin-hq.tetapan-arkib-bergambar-senarai');
});

Route::get('/tetapan-arkib-dokumen', function () {
    return view('pegawai.admin-hq.tetapan-arkib-dokumen');
});

Route::get('/tetapan-arkib-dokumen-senarai', function () {
    return view('pegawai.admin-hq.tetapan-arkib-dokumen-senarai');
});

Route::resource('/tetapan-pengumuman', PengumumanController::class);

Route::get('/tetapan-banner', function () {
    return view('pegawai.admin-hq.tetapan-banner');
});

Route::resource('/tetapan-faq', FaqController::class);

Route::get('/log-pemohon', function () {
    return view('pegawai.admin-hq.at-log-pemohon');
});

Route::get('/lihat-log-pemohon', function () {
    return view('pegawai.admin-hq.at-lihat-log-pemohon');
});

Route::get('/log-pengguna', function () {
    return view('pegawai.admin-hq.at-log-pengguna');
});

Route::get('/lihat-log-pengguna', function () {
    return view('pegawai.admin-hq.at-lihat-log-pengguna');
});

Route::get('/peranan-pdrm', function () {
    return view('pegawai.admin-hq.peranan-pdrm');
});


//
Route::get('/semakan-status-permohonan', function () {
    return view('pegawai.semakan-status-permohonan');
});

Route::get('/maklumat-status', function () {
    return view('pegawai.maklumat-status');
});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
