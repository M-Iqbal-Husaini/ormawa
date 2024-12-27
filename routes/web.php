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
use App\Http\Controllers\User\UserController;
use App\Models\Anggota;

// Guest Route
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/ormawa', function () {
        return view('ormawa');
    });

    Route::get('/login', function () {
        return view('login');
    });

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');

    Route::post('/post-login', [AuthController::class, 'post_login']);
});

// Admin Route
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Organisasi Route
    Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('admin.organisasi');
    Route::get('/organisasi/create', [OrganisasiController::class, 'create'])->name('organisasi.create');
    Route::post('/organisasi/store', [OrganisasiController::class, 'store'])->name('organisasi.store');
    Route::get('/ormawa/organisasi/detail/{id}', [OrganisasiController::class, 'detail'])->name('organisasi.detail');
    Route::get('/organisasi/edit/{id}', [OrganisasiController::class, 'edit'])->name('organisasi.edit');
    Route::post('/organisasi/update/{id}', [OrganisasiController::class, 'update'])->name('organisasi.update');
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

    // Informasi Route
    Route::get('/informasi', [DivisiController::class, 'index'])->name('ormawa.informasi');
    Route::get('/informasi/create', [DivisiController::class, 'create'])->name('informasi.create');
    Route::post('/informasi/store', [DivisiController::class, 'store'])->name('informasi.store');
    Route::get('/ormawa/informasi/detail/{id}', [DivisiController::class, 'detail'])->name('informasi.detail');
    Route::get('/informasi/edit/{id}', [DivisiController::class, 'edit'])->name('informasi.edit');
    Route::post('/informasi/update/{id}', [DivisiController::class, 'update'])->name('informasi.update');
    Route::delete('/informasi/delete/{id}', [DivisiController::class, 'delete'])->name('informasi.delete');

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
    Route::post('/anggota/update/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'delete'])->name('anggota.delete');

    // Berita Route
    Route::get('/berita', [BeritaController::class, 'index'])->name('ormawa.berita');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/ormawa/berita/detail/{id}', [BeritaController::class, 'detail'])->name('berita.detail');
    Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::post('/berita/update/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/delete/{id}', [BeritaController::class, 'delete'])->name('berita.delete');

    Route::get('/ormawa-logout', [AdminOrmawaController::class, 'ormawa_logout'])->name('ormawa.logout');

});

// User Route
Route::group(['middleware' => 'web'], function() {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
//     Route::get('/user/flashsale', [UserController::class, 'fs'])->name('user.fs');

//     Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
//     Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase']);

    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');
});
