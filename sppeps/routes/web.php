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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
