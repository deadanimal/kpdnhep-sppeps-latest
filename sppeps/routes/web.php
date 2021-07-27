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



//admin hq

Route::get('/pengurusan-data', function () {
    return view('pegawai.admin-hq.pengurusan-data');
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








// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
