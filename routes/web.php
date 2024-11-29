<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;

// Halaman utama
Route::get('/', function () {
    return view('index');
});

// Routes Blog
Route::get('/blogs', [BlogController::class, 'showBlogs'])->middleware('auth');
Route::get('/tambah', [BlogController::class, 'tambahBlog'])->middleware('auth');
Route::post('/tambah', [BlogController::class, 'createBlog'])->middleware('auth');

// Routes Auth
Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/blogs/{id}/edit', [BlogController::class, 'editBlog'])->name('blogs.edit');
Route::post('/blogs/{id}/update', [BlogController::class, 'updateBlog'])->name('blogs.update');
Route::delete('/blogs/{id}', [BlogController::class, 'deleteBlog'])->name('blogs.delete');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Logout berhasil.');
})->name('logout');
Route::get('/edit/{id}', [BlogController::class, 'editBlog'])->name('editBlog');
Route::put('/edit/{id}', [BlogController::class, 'updateBlog'])->name('updateBlog');


