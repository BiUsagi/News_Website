<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tb', function () {
    return view('thongbao');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Routes
Route::prefix('ad')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/tintucs/{id?}', [AdminController::class, 'danhsachtin'])->name('admin.tintuc.ds');
    Route::get('/tintuc/add', [AdminController::class, 'themtin'])->name('admin.tintuc.add');
    Route::post('/tintuc/add_', [AdminController::class, 'themtin_'])->name('admin.tintuc.add_');
    Route::get('/tintuc/delete/{id}', [AdminController::class, 'xoatt'])->name('admin.tintuc.delete');
    Route::get('/tintuc/edit/{id}', [AdminController::class, 'suatin'])->name('admin.tintuc.edit');
    Route::put('/tintuc/update/{id}', [AdminController::class, 'suatin_'])->name('admin.tintuc.update');

    Route::get('/danhmucs/{id?}', [AdminController::class, 'danhsachdm'])->name('admin.danhmuc.ds');
    Route::get('/danhmuc/add', [AdminController::class, 'themdm'])->name('admin.danhmuc.add');
    Route::post('/danhmuc/add_', [AdminController::class, 'themdm_'])->name('admin.danhmuc.add_');
    Route::get('/danhmuc/delete/{id}', [AdminController::class, 'xoadm'])->name('admin.danhmuc.delete');
    Route::get('/danhmuc/edit/{id}', [AdminController::class, 'suadm'])->name('admin.danhmuc.edit');
    Route::put('/danhmuc/update/{id}', [AdminController::class, 'suadm_'])->name('admin.danhmuc.update');

    Route::get('/user', [AdminController::class, 'danhsachuser'])->name('admin.user.ds');
    Route::post('/block/update/{id}', [AdminController::class, 'block'])->name('admin.user.block');

    Route::get('/binhluan', [AdminController::class, 'danhsachbinhluan'])->name('admin.binhluan.ds');
    Route::get('/binhluan/xoa/{id}', [AdminController::class, 'xoabinhluan'])->name('admin.binhluan.xoa');
    Route::get('/binhluan/xem/{id}', [AdminController::class, 'xembinhluan'])->name('admin.binhluan.xem');


});




// Web Routes
Route::prefix('/')->middleware('block')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/chitiet/{id}', [HomeController::class, 'chitiet'])->name('chitiet');
    Route::get('/danhmuc/{id}', [HomeController::class, 'danhmuc'])->name('danhmuc');
    Route::get('/timkiem', [HomeController::class, 'timkiem'])->name('timkiem');
    Route::get('/lienhe', [HomeController::class, 'lienhe'])->name('lienhe');
    Route::post('/binhluan/{tinTucId}', [HomeController::class, 'store'])->name('binhLuan.store');
    Route::post('/binhluan/reply/{binhLuanId}', [HomeController::class, 'reply'])->name('binhLuan.reply');
    Route::post('/binhluan/like/{binhLuanId}', [HomeController::class, 'likeComment'])->name('binhLuan.like');
    Route::delete('/binhluan/xoa/{id}', [HomeController::class, 'destroy'])->name('binhLuan.destroy');


});



