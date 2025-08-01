<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);
Route::resource('users', UserController::class);
Route::get('/posts/attach/image', [PostController::class, 'attach_image_test'])->name('posts.image_test_attach');
Route::get('/posts/attach/image/get', [PostController::class, 'attach_image_test_get'])->name('posts.image_test_attach_get');
