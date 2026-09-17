<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\PostController;
Route::resource('posts', PostController::class);

use App\Http\Controllers\CommentController;

Route::post('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');
