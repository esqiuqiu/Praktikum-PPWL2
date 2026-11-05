<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/education', function () {
    return view('education');
})->name('education');

Route::get('/posts/trash', [PostController::class, 'trash'])
    ->name('posts.trash');

Route::patch('/posts/{id}/restore', [PostController::class, 'restore'])
    ->name('posts.restore');

Route::delete('/posts/{id}/force-delete', [PostController::class, 'forceDelete'])
    ->name('posts.forceDelete');

// Daftarkan route resource untuk Pertemuan 5
Route::resource('projects', ProjectController::class);
// Pertemuan 7
Route::resource('posts', PostController::class);
