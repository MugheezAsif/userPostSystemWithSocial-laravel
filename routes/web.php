<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// all user routes
Auth::routes(['verify' => true]);
// dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// posts routes
// index
Route::get('/', [PostController::class, 'index'])->name('root_path');
// create
Route::get('/posts/new', [PostController::class, 'create'])->middleware(['auth', 'verified']);
// store
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
// edit
Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->middleware('auth');
// update
Route::put('/posts/{post}', [PostController::class, 'update'])->middleware('auth');
// delete
Route::delete('/posts/{post}', [PostController::class, 'delete'])->middleware('auth');
// all posts
Route::get('/posts/all', [PostController::class, 'allPosts']);
// like post
Route::get('/posts/{post}/like', [PostController::class, 'like'])->middleware(['auth', 'verified']);
// unlike post
Route::get('/posts/{post}/unlike', [PostController::class, 'unlike'])->middleware(['auth', 'verified']);
// add to favourite
Route::get('/posts/{post}/fav', [PostController::class, 'fav'])->middleware(['auth', 'verified']);
// un favourite a post
Route::get('/posts/{post}/unfav', [PostController::class, 'unfav'])->middleware(['auth', 'verified']);
// show
Route::get('/posts/{post}', [PostController::class, 'show']);
// add a comment
Route::post('/posts/{post}', [PostController::class, 'comment'])->middleware(['auth', 'verified']);
// ******************************************************************************************
// users
// profile page
Route::get('/profile/{user}', [UserController::class, 'profile'])->middleware('auth');
// follow the user
Route::get('/profile/{user}/follow', [UserController::class, 'follow'])->middleware(['auth', 'verified']);
// unfollow user
Route::get('/profile/{user}/unfollow', [UserController::class, 'unfollow'])->middleware(['auth', 'verified']);
// send friend request
Route::get('/profile/{user}/request', [UserController::class, 'request'])->middleware(['auth', 'verified']);
// unfriend
Route::get('/profile/{user}/unfriend', [UserController::class, 'unfriend'])->middleware(['auth', 'verified']);
// accept request
Route::get('/user/{user}/accept', [UserController::class, 'accept'])->middleware(['auth', 'verified']);