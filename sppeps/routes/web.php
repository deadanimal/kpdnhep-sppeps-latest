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

//cms
use App\Http\Controllers\KategorifaqController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ArkibdokumenController;
use App\Http\Controllers\ArkibgambarController;
use App\Http\Controllers\LaporanstatistikController;
use App\Http\Controllers\SenaraigambarController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SemakanStatusController;
use App\Http\Controllers\SenaraidokumenController;

//landing
use App\Http\Controllers\FaqlandingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ArkibgambarlandingController;
use App\Http\Controllers\ArkibdokumenlandingController;

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

Route::post('/cari-senarai-hitam', [SenaraiHitamController::class, 'carisenaraihitam']);

Route::post('/cari-tambah-senarai-hitam', [SenaraiHitamController::class, 'caritambahsenaraihitam']);

Route::resource('/profil', ProfilController::class);

Route::post('/cari-eps', [SemakanStatusController::class, 'caripermohonan']);





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

// Route::get('/profil', function () {
//     return view('auth.profile_');
// });

Route::get('/profil-pegawai', function () {
    return view('auth.profil-pegawai');
});

Route::get('/kemaskini-profil', function () {
    return view('auth.profile-update_');
});

Route::get('/change-password', function () {
    return view('auth.change-password');
});

//landing
Route::get('/', [LandingController::class, 'landing']);

Route::get('/arkib-bergambar', [ArkibgambarlandingController::class, 'arkibgambarland']);
Route::get('/arkib-bergambar/{gambar}', [ArkibgambarlandingController::class, 'arkibgambarlandshow']);
Route::get('/arkib-bergambar-info/{gambar}', [ArkibgambarlandingController::class, 'arkibgambarlaninfolandshow']);

Route::resource('/arkib-dokumen', ArkibdokumenlandingController::class );
Route::get('/arkib-dokumen/{dokumen}', [ArkibdokumenlandingController::class, 'dokumenshow']);
// Route::get('/arkib-dokumen-senarai', function () {
//     return view('global.arkib-dokumen-senarai');
// });

Route::get('/faq', [FaqlandingController::class, 'faqlanding']);


Route::get('/semakan-status-eps', function () {
    return view('global.semakan-status-eps');
});


//pemohon
Route::get('/dashboard-pemohon', function () {
    return view('pemohon.dashboard');
});

Route::get('/maklumat-status-pemohon', function () {
    return view('pemohon.maklumat-status');
});

Route::get('/permohonan-berjaya', function () {
    return view('pemohon.permohonan-success');
});

Route::get('/permohonan-disimpan', function () {
    return view('pemohon.permohonan-simpan');
});


// Route::get('/permohonan-baru', function () {
//     return view('pemohon.permohonan-baru');
// });

// Route::get('/permohonan-pembaharuan', function () {
//     return view('pemohon.permohonan-pembaharuan');
// });

// Route::get('/permohonan-pendua', function () {
//     return view('pemohon.permohonan-pendua');
// });

// Route::get('/permohonan-rayuan', function () {
//     return view('pemohon.permohonan-rayuan');
// });

// Route::get('/status-permohonan', function () {
//     return view('pemohon.status-permohonan');
// });


//pdrm
// Route::get('/pdrm-tugasan-baru', function () {
//     return view('pegawai.pdrm.pdrm-tugasan-baru');
// });

// Route::get('/pdrm-maklumat-pemohon', function () {
//     return view('pegawai.pdrm.pdrm-maklumat-pemohon');
// });

// Route::get('/pdrm-tugasan-selesai', function () {
//     return view('pegawai.pdrm.pdrm-tugasan-selesai');
// });


//pegawai negeri
// Route::get('/negeri-tugasan-baru', function () {
//     return view('pegawai.negeri.negeri-tugasan-baru');
// });

// Route::get('/negeri-maklumat-pemohon', function () {
//     return view('pegawai.negeri.negeri-maklumat-pemohon');
// });

// Route::get('/negeri-tugasan-selesai', function () {
//     return view('pegawai.negeri.negeri-tugasan-selesai');
// });

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

Route::get('/laporan-statistik/peratusan-kelulusan-permit', [LaporanstatistikController::class, 'kelulusanpermit']);

Route::get('/laporan-statistik/peratusan-permit-ditolak', [LaporanstatistikController::class, 'permitditolak']);

Route::get('/laporan-statistik/laporan-sejarah-permohonan', [LaporanstatistikController::class, 'sejarahpermohonan']);

Route::get('/laporan-statistik/laporan-senarai-hitam', [LaporanstatistikController::class, 'senaraihitam']);

Route::get('/laporan-statistik/statistik-pemegang-permit', [LaporanstatistikController::class, 'pegangpermit']);

Route::get('/laporan-statistik/statistik-kutipan-fi', [LaporanstatistikController::class, 'kutipanfi']);


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

Route::resource('/tetapan-arkib-bergambar', ArkibgambarController::class);
Route::get('/tetapan-arkib-bergambar/{arkibgambar}/delete', [ArkibgambarController::class, 'destroy']);

Route::resource('/tetapan-arkib-bergambar-senarai', SenaraigambarController::class);
Route::get('/tetapan-arkib-bergambar-senarai/{senaraigambar}/delete', [SenaraigambarController::class, 'destroy']);

Route::resource('/tetapan-arkib-dokumen', ArkibdokumenController::class);
Route::get('/tetapan-arkib-dokumen/{arkibdokumen}/delete', [ArkibdokumenController::class, 'destroy']);

Route::resource('/tetapan-arkib-dokumen-senarai', SenaraidokumenController::class);
Route::get('/tetapan-arkib-dokumen-senarai/{senaraidokumen}/delete', [SenaraidokumenController::class, 'destroy']);

Route::resource('/tetapan-pengumuman', PengumumanController::class);
Route::get('/tetapan-pengumuman/{pengumuman}/delete', [PengumumanController::class, 'destroy']);

Route::resource('/tetapan-banner', BannerController::class);
Route::get('/tetapan-banner/{banner}/delete', [BannerController::class, 'destroy']);

Route::resource('/tetapan-faq', FaqController::class);
Route::get('/tetapan-faq/{faq}/delete', [FaqController::class, 'destroy']);
Route::get('/tetapan-faq/{kategorifaq}/delete', [FaqController::class, 'destroy']);


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
