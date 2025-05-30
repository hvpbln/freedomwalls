<?php

use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::post('/submit-post', [PostController::class, 'store'])->name('posts.store');

Route::middleware('auth')->group(function () {
    Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('admin.posts');
    Route::post('/admin/posts/{id}/accept', [PostController::class, 'accept'])->name('posts.accept');
    Route::post('/admin/posts/{id}/decline', [PostController::class, 'decline'])->name('posts.decline');
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/admin/declined', [PostController::class, 'declined'])->name('posts.declined');
});

Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('admin.posts');
Route::get('/dashboard', fn () => redirect()->route('admin.posts'))->name('dashboard');

require __DIR__.'/auth.php';
