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
use App\Http\Controllers\TetapanPerananController;

//landing
use App\Http\Controllers\FaqlandingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ArkibgambarlandingController;
use App\Http\Controllers\ArkibdokumenlandingController;
use App\Http\Controllers\PengurusanDataController;
use App\Http\Controllers\JenisTugasanControiller;

use App\Http\Controllers\PerananPegawaiController;
use App\Http\Controllers\SemakanIcController;

use App\Http\Controllers\SemakanPermohonanPegawaiController;

use App\Http\Controllers\AuditController;
use App\Http\Controllers\CetakanPermitController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\LocalizationController;

require __DIR__ . '/auth.php';

Route::get('/lol', [LolController::class, 'asd']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/en', [LocalizationController::class, 'change_en']);
Route::get('/ms', [LocalizationController::class, 'change_ms']);

// theme color
Route::get('/default', [LocalizationController::class, 'color_default']);
Route::get('/blue', [LocalizationController::class, 'color_blue']);
Route::get('/black', [LocalizationController::class, 'color_black']);
Route::get('/brown', [LocalizationController::class, 'color_brown']);

//font color
Route::get('/font_default', [LocalizationController::class, 'color_font_default']);
Route::get('/font_blue', [LocalizationController::class, 'color_font_blue']);
Route::get('/font_brown', [LocalizationController::class, 'color_font_brown']);
Route::get('/font_green', [LocalizationController::class, 'color_font_green']);
//localization

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
Route::get('/profil_pegawai', [ProfilController::class, 'profil_pegawai']);

Route::post('/cari-eps', [SemakanStatusController::class, 'caripermohonan']);

Route::resource('/pengurusan-data', PengurusanDataController::class);
Route::post('/cari_pengurusan_data', [PengurusanDataController::class, 'cari']);
Route::get('/set_semula/{id}', [PengurusanDataController::class, 'reset_cetak']);

Route::get('/pemproses_negeri_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_pemproses_negeri']);
Route::get('/penyokong_negeri_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_penyokong_negeri']);
Route::get('/pelulus_negeri_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_pelulus_negeri']);
Route::get('/pemproses_hq_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_pemproses_hq']);
Route::get('/penyokong_hq_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_penyokong_hq']);
Route::get('/pelulus_hq_tugasan_baru', [JenisTugasanControiller::class, 'tugasan_baru_pelulus_hq']);

Route::post('/cari_pemproses_negeri_tugasan_baru', [JenisTugasanControiller::class, 'cari_tugasan_baru_pemproses_negeri']);
Route::post('/cari_penyokong_negeri_tugasan_baru', [JenisTugasanControiller::class, 'cari_tugasan_baru_pemproses_negeri']);
Route::post('/cari_pelulus_negeri_tugasan_baru', [JenisTugasanControiller::class, 'cari_tugasan_baru_pelulus_negeri']);
Route::post('/cari_pemproses_hq_tugasan_baru', [JenisTugasanControiller::class, 'cari_tugasan_baru_pemproses_hq']);
Route::post('/cari_penyokong_hq_tugasan_baru', [JenisTugasanControiller::class, 'cari_tugasan_baru_penyokong_hq']);
Route::post('/cari_pelulus_hq_tugasan_baru', [JenisTugasanControiller::class, 'cari_tugasan_baru_pelulus_hq']);

Route::get('/pemproses_negeri_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_pemproses_negeri']);
Route::get('/penyokong_negeri_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_penyokong_negeri']);
Route::get('/pelulus_negeri_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_pelulus_negeri']);
Route::get('/pemproses_hq_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_pemproses_hq']);
Route::get('/penyokong_hq_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_penyokong_hq']);
Route::get('/pelulus_hq_tugasan_selesai', [TugasanSelesaiController::class, 'tugasan_selesai_pelulus_hq']);

Route::post('/cari_pemproses_negeri_tugasan_selesai', [TugasanSelesaiController::class, 'cari_tugasan_selesai_pemproses_negeri']);
Route::post('/cari_penyokong_negeri_tugasan_selesai', [TugasanSelesaiController::class, 'cari_tugasan_selesai_penyokong_negeri']);
Route::post('/cari_pelulus_negeri_tugasan_selesai', [TugasanSelesaiController::class, 'cari_tugasan_selesai_pelulus_negeri']);
Route::post('/cari_pemproses_hq_tugasan_selesai', [TugasanSelesaiController::class, 'cari_tugasan_selesai_pemproses_hq']);
Route::post('/cari_penyokong_hq_tugasan_selesai', [TugasanSelesaiController::class, 'cari_tugasan_selesai_penyokong_hq']);
Route::post('/cari_pelulus_hq_tugasan_selesai', [TugasanSelesaiController::class, 'cari_tugasan_selesai_pelulus_hq']);


Route::resource('/peranan_pdrm', PerananPegawaiController::class);
Route::post('/cari_pdrm', [PerananPegawaiController::class, 'cari']);

Route::resource('/peranan_pegawai', TetapanPerananController::class);
Route::get('/senarai_pegawai', [TetapanPerananController::class, 'senarai_pegawai']);

Route::post('/semakan_no_kp', [SemakanIcController::class, 'semakanIc']);
Route::get('/reload-captcha', [SemakanIcController::class, 'reloadCaptcha']);

Route::resource('/log_pengguna', AuditController::class);
Route::get('/log_pemohon', [AuditController::class, 'log_pemohon']);
Route::get('/log_pemohon/{id}', [AuditController::class, 'lihat_log_pemohon']);
Route::post('/cari_log_pemohon', [AuditController::class, 'cari_log_pemohon']);

Route::resource('/semakan_permohonan', SemakanPermohonanPegawaiController::class);

Route::resource('/cetakan_permit', CetakanPermitController::class);
Route::get('/cetak_permit/{id}', [CetakanPermitController::class, 'cetakpermit']);
Route::post('/carian_pemohon', [CetakanPermitController::class, 'cari']);

Route::resource('/tukar_kata_laluan', ChangePasswordController::class);
Route::get('/tukar_kata_laluan_pegawai', [ChangePasswordController::class, 'tukar_password_pegawai']);

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

Route::get('/kemaskini-profil', function () {
    return view('auth.profile-update_');
});

Route::get('/change-password', function () {
    return view('auth.change-password');
});

//landing
Route::get('/', [LandingController::class, 'landing'] );

Route::get('/arkib-bergambar', [ArkibgambarlandingController::class, 'arkibgambarland']);
Route::get('/arkib-bergambar/{gambar}', [ArkibgambarlandingController::class, 'arkibgambarlandshow']);
Route::get('/arkib-bergambar-info/{gambar}', [ArkibgambarlandingController::class, 'arkibgambarlaninfolandshow']);

Route::get('/arkib-dokumen', [ArkibdokumenlandingController::class, 'dokumenland']);
Route::get('/arkib-dokumen-senarai/{dokumen}', [ArkibdokumenlandingController::class, 'dokumenshow']);
// Route::get('/arkib-dokumen-senarai', function () {
//     return view('global.arkib-dokumen-senarai');
// });

Route::get('/faq', [FaqlandingController::class, 'faqlanding']);


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
Route::get('/tetapan-kategorifaq/{kategorifaq}/delete', [KategorifaqController::class, 'destroy']);



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
