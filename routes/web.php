<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\WelcomeController;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/categories/all', [WelcomeController::class, 'getCategories'])->name('getCategories');
Route::resource('/categories', CategoryController::class)->middleware(['auth', 'verified']);
Route::get('/categories/{category}/posts', [WelcomeController::class, 'getPostsByCategory'])->name('categoryPosts');

Route::resource('/posts', ArticleController::class)->middleware(['auth', 'verified']);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/posts/{post}/publish', [ArticleController::class, 'publish'])->name('posts.publish');
    Route::get('/posts/{post}/unpublish', [ArticleController::class, 'unpublish'])->name('posts.unpublish');
});
Route::get('/posts/{post}/show', [WelcomeController::class, 'getPost'])->name('getPost');

Route::get('/authors/all', [WelcomeController::class, 'getAuthors'])->name('getAuthors');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/authors', AuthorController::class);
    Route::put('/authors/{user}/activation', [AuthorController::class, 'activation'])->name('authors.activation');
    Route::put('/authors/{user}/password-reset', [AuthorController::class, 'passwordReset'])->name('authors.passwordReset');
    Route::put('/authors/{user}/change-role', [AuthorController::class, 'changeRole'])->name('authors.changeRole');
});
Route::get('/authors/{user}/posts', [WelcomeController::class, 'getPostsByAuthor'])->name('authorPosts');

Route::resource('/tags', TagController::class)->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
