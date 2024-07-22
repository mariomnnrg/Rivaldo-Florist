<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PapanController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;



Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('detail/{papan:slug}', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::get('contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('contact', [\App\Http\Controllers\HomeController::class, 'contactStore'])->name('contact_store');
    Route::get('tentang', [\App\Http\Controllers\HomeController::class, 'tentang'])->name('tentang');



Route::get('admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dahsboard.index')->Middleware('auth');
Route::resource('admin/papans',PapanController::class);
Route::put('/admin/papans/{papan}/updateImage', [PapanController::class, 'updateImage'])->name('admin.papans.updateImage');

Route::get('messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin.messages.index');
Route::delete('messages/{message}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('message.destroy');

/* Masih tanda tanya*/
Route::put('/admin/papans/{papan}/updateImage', [PapanController::class, 'updateImage'])->name('admin.papans.updateImage');

/* User Management */

Auth::routes();


Route::prefix('/')->group(function () {
    Route::get('/index', [ProfileController::class, 'index'])->name('admin.profile.index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

});



Route::resource('galeri', 'App\Http\Controllers\Admin\GaleriController');
Route::get('/galeri', [App\Http\Controllers\Admin\GaleriController::class, 'index'])->name('admin.galeri.index');
Route::get('/galeri/create', [App\Http\Controllers\Admin\GaleriController::class, 'create'])->name('admin.galeri.create');
Route::get('/galeri/{galeri}/edit', [App\Http\Controllers\Admin\GaleriController::class, 'edit'])->name('admin.galeri.edit');
Route::put('/galeri/{galeri}', [App\Http\Controllers\Admin\GaleriController::class, 'update'])->name('admin.galeri.update');

