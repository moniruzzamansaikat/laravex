<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'front.home.index');

// posts routes
Route::prefix('posts')->controller(PostController::class)->name('posts.')->group(function () {
    // if logged in
    Route::middleware(['auth'])->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::delete('/{post}', 'destroy')->name("delete");
        Route::post('/update', 'update')->name('update');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/{post}/likes', 'handle_likes')->name('likes');
    });

    Route::get('/', 'index')->name('index');
    Route::get('/{post}/likes', 'get_likes')->name('likes');
    Route::get('/{post}', 'show')->name('show');
});

// post comments
Route::prefix('posts')->controller(CommentController::class)->group(function () {
    Route::get('/{post}/comments', 'index')->name('posts.comments');
    // if logged in
    Route::middleware(['auth'])->group(function () {
        Route::post('/{post}/comments', 'store')->name('posts.comments');
        Route::delete('/comments/{comment}', 'destroy')->name('comments.delete');
    });
});

// post comment
Route::post('/posts/{post}/comments/{comment}/reply', [ReplyController::class, 'store'])->name('post.comment.reply.store');

// user route
Route::prefix('user')->middleware('auth')->controller(UserController::class)->name('user.')->group(function () {
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/profile/{user:username}', 'profileOther')->name('profile.other');
    Route::get('/setting', 'setting')->name('profile.setting');
    Route::put('/setting', 'update')->name('profile.setting');
    Route::delete('/{user}/delete', 'removeUser')->name('remove');
});

// auth route
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login');
    Route::get('/register', 'register');
    Route::post('/register', 'handle_register');
    Route::post('/login', 'handle_login')->name('login');
    Route::get('/logout', 'handle_logout')->name('logout');
});
