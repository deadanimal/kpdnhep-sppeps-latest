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

use App\Http\Controllers\LolController;

use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasanSelesaiController;
use App\Http\Controllers\BorangPermohonan;
use App\Http\Controllers\SenaraiHitamController;

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
use App\Http\Controllers\PengurusanDataController;
use App\Http\Controllers\JenisTugasanControiller;

use App\Http\Controllers\PerananPegawaiController;
use App\Http\Controllers\CetakanPermitController;
use App\Http\Controllers\SemakanPermohonanPegawaiController;
// Route::get('/dashboard', function () {
//     return view('pemohon.dashboard');
// })->middleware(['auth'])->name('dashboard');\


require __DIR__ . '/auth.php';

Route::get('/lol', [LolController::class, 'asd']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');



Route::resource('/tugasan-selesai', TugasanSelesaiController::class);

Route::resource('/permohonan', PermohonanController::class);
Route::post('/cari', [PermohonanController::class, 'cari']);
Route::post('/maklumat_permohonan', [PermohonanController::class, 'maklumatPermohonan']);
Route::post('/cetak_borang', [PermohonanController::class, 'cetak']);

Route::post('/cari-tugasan-selesai', [TugasanSelesaiController::class, 'cari']);

Route::post('/borang', [BorangPermohonan::class, 'borang']);

Route::resource('/senarai-hitam', SenaraiHitamController::class);

Route::get('/tambah-senarai-hitam', [SenaraiHitamController::class, 'senaraiDiluluskan']);

Route::post('/cari-senarai-hitam', [SenaraiHitamController::class, 'carisenaraihitam']);

Route::post('/cari-tambah-senarai-hitam', [SenaraiHitamController::class, 'caritambahsenaraihitam']);

Route::post('/register_user', [ProfilController::class, 'register']); //dummy
Route::post('/profil/login-insid', [ProfilController::class, 'login_insid']);
Route::post('/profil/login-myhub', [ProfilController::class, 'login_myhub']);
Route::resource('/profil', ProfilController::class);

Route::post('/cari-eps', [SemakanStatusController::class, 'caripermohonan']);

Route::resource('/pengurusan-data', PengurusanDataController::class);

Route::get('/pemproses_negeri_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_pemproses_negeri']);
Route::get('/penyokong_negeri_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_penyokong_negeri']);
Route::get('/pelulus_negeri_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_pelulus_negeri']);
// Route::get('/pemproses__hq_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_pemproses_hq']);
Route::get('/pemproses_hq_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_pemproses_hq']);
Route::get('/penyokong_hq_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_penyokong_hq']);
Route::get('/pelulus_hq_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_pelulus_hq']);

Route::get('/pemproses_negeri_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_pemproses_negeri']);
Route::get('/penyokong_negeri_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_penyokong_negeri']);
Route::get('/pelulus_negeri_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_pelulus_negeri']);
Route::get('/pemproses_hq_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_pemproses_hq']);
Route::get('/penyokong_hq_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_penyokong_hq']);
Route::get('/pelulus_hq_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_pelulus_hq']);

Route::resource('/peranan_pdrm', PerananPegawaiController::class);
Route::post('/cari_pdrm', [PerananPegawaiController::class, 'cari']);

Route::resource('/cetakan_permit', CetakanPermitController::class);
Route::get('/cetak_permit/{id}', [CetakanPermitController::class, 'cetakpermit']);
Route::post('/carian_pemohon', [CetakanPermitController::class, 'cari']);
Route::resource('/semakan_permohonan', SemakanPermohonanPegawaiController::class);

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

Route::get('/permohonan-berjaya', function () {
    return view('pemohon.permohonan-success');
});

Route::get('/permohonan-disimpan', function () {
    return view('pemohon.permohonan-simpan');
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

// Route::get('/peratusan-permit-ditolak', function () {
//     return view('laporan-statistik.peratusan-permit-ditolak');
// });

Route::get('/laporan-statistik/laporan-sejarah-permohonan', [LaporanstatistikController::class, 'sejarahpermohonan']);

// Route::get('/laporan-sejarah-permohonan', function () {
//     return view('laporan-statistik.laporan-sejarah-permohonan');
// });

Route::get('/laporan-statistik/laporan-senarai-hitam', [LaporanstatistikController::class, 'senaraihitam']);

// Route::get('/laporan-senarai-hitam', function () {
//     return view('laporan-statistik.laporan-senarai-hitam');
// });

Route::get('/laporan-statistik/statistik-pemegang-permit', [LaporanstatistikController::class, 'pegangpermit']);

// Route::get('/statistik-pemegang-permit', function () {
//     return view('laporan-statistik.statistik-pemegang-permit');
// });

Route::get('/laporan-statistik/statistik-kutipan-fi', [LaporanstatistikController::class, 'kutipanfi']);

// Route::get('/statistik-kutipan-fi', function () {
//     return view('laporan-statistik.statistik-kutipan-fi');
// });


//admin hq





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

Route::get('/tetapan-arkib-dokumen-senarai', function () {
    return view('pegawai.admin-hq.tetapan-arkib-dokumen-senarai');
});

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
