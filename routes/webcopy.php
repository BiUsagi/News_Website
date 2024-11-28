<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Routes
Route::prefix('ad')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/tintuc', [AdminController::class, 'danhsachtin'])->name('admin.tintuc.ds');
    Route::get('/tintuc/add', [AdminController::class, 'themtin'])->name('admin.tintuc.add');
    Route::post('/tintuc/add_', [AdminController::class, 'themtin_'])->name('admin.tintuc.add_');
    Route::get('/tintuc/delete/{id}', [AdminController::class, 'xoatt'])->name('admin.tintuc.delete');
    Route::get('/tintuc/edit/{id}', [AdminController::class, 'suatin'])->name('admin.tintuc.edit');
    Route::put('/tintuc/update/{id}', [AdminController::class, 'suatin_'])->name('admin.tintuc.update');

    Route::get('/danhmuc', [AdminController::class, 'danhsachdm'])->name('admin.danhmuc.ds');
    Route::get('/danhmuc/add', [AdminController::class, 'themdm'])->name('admin.danhmuc.add');
    Route::post('/danhmuc/add_', [AdminController::class, 'themdm_'])->name('admin.danhmuc.add_');
    Route::get('/danhmuc/delete/{id}', [AdminController::class, 'xoadm'])->name('admin.danhmuc.delete');
    Route::get('/danhmuc/edit/{id}', [AdminController::class, 'suadm'])->name('admin.danhmuc.edit');
    Route::put('/danhmuc/update/{id}', [AdminController::class, 'suadm_'])->name('admin.danhmuc.update');
});




// Web Routes
Route::group(['prefix' => ''], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/chitiet/{id}', [HomeController::class, 'chitiet'])->name('chitiet');
    Route::get('/danhmuc/{id}', [HomeController::class, 'danhmuc'])->name('danhmuc');
    Route::get('/lienhe', [HomeController::class, 'lienhe'])->name('lienhe');
});



