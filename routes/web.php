<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard')->middleware('auth');

//register
Route::get('register', [AuthController::class, 'show'])->name('register');
Route::post('register', [AuthController::class, 'store']);

//login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate']);

//logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//post
Route::controller(PostController::class)->group(function() {
    Route::get('posts', 'index')->name('posts.index');
    Route::post('posts/create', 'store')->name('posts.create');
    Route::get('posts/{post}/detail', 'show')->name('posts.detail');
    Route::delete('/posts/delete/{post}', 'destroy')->name('posts.delete');
});

//likes
Route::controller(LikeController::class)->group(function() {
    Route::post('posts/{post}/likes', 'store')->name('posts.likes');
    Route::delete('posts/{post}/likes', 'destroy')->name('likes.delete');
});

//users posts
Route::get('/users/{user:name}/posts', [PostUserController::class, 'show'])->name('users.posts');

//profile
Route::controller(ProfileController::class)->middleware('auth')->group(function() {
    Route::get('/profile/{user:name}/user', 'show')->name('profile.user');
    Route::get('/passwrod/{user:name}/reset', 'reset')->name('password.reset');
    Route::patch('/passwrod/{user:name}/reset', 'update');
});