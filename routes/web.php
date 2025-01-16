<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrganisasiController;
use App\Http\Controllers\Admin\OrmawaController;
use App\Http\Controllers\Ormawa\AdminOrmawaController;
use App\Http\Controllers\Ormawa\AnggotaController;
use App\Http\Controllers\Ormawa\BeritaController;
use App\Http\Controllers\Ormawa\DivisiController;
use App\Http\Controllers\Ormawa\PendaftaranController;
use App\Http\Controllers\Ormawa\LinkController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\PendaftarController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\OrgController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Guest\OrgzController;
use App\Http\Controllers\Guest\BrtController;

// Guest Route
Route::group(['middleware' => 'web'], function() {
    Route::get('/', [GuestController::class, 'index'])->name('guest.index');
    Route::get('/guest/orma', [OrgzController::class, 'index'])->name('guest.organisasi');
    Route::get('/guest/orma/{id}', [OrgzController::class, 'detail'])->name('guest.organisasi.detail');
    Route::get('/guest/news', [BrtController::class, 'index'])->name('guest.berita');
    Route::get('/guest/news/{id}', [BrtController::class, 'detail'])->name('guest.berita.detail');

    Route::get('/login', [AuthController::class, 'login'])->name('guest.login');
    Route::post('/post-login', [AuthController::class, 'post_login']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');
});

// Admin Route
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Organisasi Route
    Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('admin.organisasi');
    Route::get('/organisasi/create', [OrganisasiController::class, 'create'])->name('organisasi.create');
    Route::post('/organisasi/store', [OrganisasiController::class, 'store'])->name('organisasi.store');
    Route::get('/organisasi/detail/{id}', [OrganisasiController::class, 'detail'])->name('organisasi.detail');
    Route::get('/organisasi/edit/{id}', [OrganisasiController::class, 'edit'])->name('organisasi.edit');
    Route::put('/organisasi/update/{id}', [OrganisasiController::class, 'update'])->name('organisasi.update');
    Route::delete('/organisasi/delete/{id}', [OrganisasiController::class, 'delete'])->name('organisasi.delete');

    // Admin Ormawa Route
    Route::get('admin/ormawa', [OrmawaController::class, 'index'])->name('admin.ormawa');
    Route::get('admin/ormawa/create', [OrmawaController::class, 'create'])->name('ormawa.create');
    Route::post('admin/ormawa/store', [OrmawaController::class, 'store'])->name('ormawa.store');
    Route::get('admin/ormawa/ormawa/detail/{id}', [OrmawaController::class, 'detail'])->name('ormawa.detail');
    Route::get('admin/ormawa/edit/{id}', [OrmawaController::class, 'edit'])->name('ormawa.edit');
    Route::post('admin/ormawa/update/{id}', [OrmawaController::class, 'update'])->name('ormawa.update');
    Route::delete('admin/ormawa/delete/{id}', [OrmawaController::class, 'delete'])->name('ormawa.delete');

    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
});

// Admin Ormawa Route
Route::group(['middleware' => 'ormawa'], function() {
    Route::get('/ormawa', [AdminOrmawaController::class, 'dashboard'])->name('ormawa.dashboard');

    // Divisi Route
    Route::get('/divisi', [DivisiController::class, 'index'])->name('ormawa.divisi');
    Route::get('/divisi/create', [DivisiController::class, 'create'])->name('divisi.create');
    Route::post('/divisi/store', [DivisiController::class, 'store'])->name('divisi.store');
    Route::get('/ormawa/divisi/detail/{id}', [DivisiController::class, 'detail'])->name('divisi.detail');
    Route::get('/divisi/edit/{id}', [DivisiController::class, 'edit'])->name('divisi.edit');
    Route::post('/divisi/update/{id}', [DivisiController::class, 'update'])->name('divisi.update');
    Route::delete('/divisi/delete/{id}', [DivisiController::class, 'delete'])->name('divisi.delete');

    // Anggota Route
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('ormawa.anggota');
    Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
    Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('/ormawa/anggota/detail/{id}', [AnggotaController::class, 'detail'])->name('anggota.detail');
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/anggota/update/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'delete'])->name('anggota.delete');

    // Berita Route
    Route::get('/berita', [BeritaController::class, 'index'])->name('ormawa.berita');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/ormawa/berita/detail/{id}', [BeritaController::class, 'detail'])->name('berita.detail');
    Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::post('/berita/update/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/delete/{id}', [BeritaController::class, 'delete'])->name('berita.delete');

    // Pendaftaran Route
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('ormawa.pendaftaran');
    Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/ormawa/pendaftaran/detail/{id}', [PendaftaranController::class, 'detail'])->name('pendaftaran.detail');
    Route::get('/pendaftaran/edit/{id}', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
    Route::post('/pendaftaran/update/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::delete('/pendaftaran/delete/{id}', [PendaftaranController::class, 'delete'])->name('pendaftaran.delete');

    // Wa Link
    Route::get('whatsapp', [LinkController::class, 'index'])->name('ormawa.whatsapp');
    Route::get('whatsapp/create', [LinkController::class, 'create'])->name('whatsapp.create');
    Route::post('whatsapp', [LinkController::class, 'store'])->name('whatsapp.store');
    Route::get('whatsapp/{id}/edit', [LinkController::class, 'edit'])->name('ormawa.whatsapp.edit');
    Route::put('whatsapp/{id}', [LinkController::class, 'update'])->name('ormawa.whatsapp.update');
    Route::delete('whatsapp/{id}', [LinkController::class, 'delete'])->name('ormawa.whatsapp.delete');


    Route::get('/ormawa-logout', [AuthController::class, 'ormawa_logout'])->name('ormawa.logout');

});

// User Route
Route::group(['middleware' => 'user'], function() {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    Route::get('/user/organisasi', [OrgController::class, 'index'])->name('user.organisasi');
    Route::get('/user/organisasi/{id}', [OrgController::class, 'detail'])->name('organisasi.detail');

    Route::get('/user/daftar', [UserController::class, 'pendaftaran'])->name('user.pendaftaran');
    Route::get('/pendaftaran/create/{id_organisasi?}', [PendaftarController::class, 'create'])->name('pendaftaran.create');
    Route::post('/user/pendaftaran/store', [PendaftarController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/get-divisi/{id}', [PendaftarController::class, 'divisi']);
    Route::get('/pendaftaran/success', [PendaftarController::class, 'success'])->name('pendaftaran.success');

    Route::get('/user/berita', [NewsController::class, 'index'])->name('user.berita');
    Route::get('/berita/{id}', [NewsController::class, 'detail'])->name('berita.detail');

    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');
});

