<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\WelcomeController;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/{post}', [WelcomeController::class, 'getPost'])->name('getPost');
Route::get('/categories/{category}/posts', [WelcomeController::class, 'getPostsByCategory'])->name('categoryPosts');
Route::get('/categories/all', [WelcomeController::class, 'getCategories'])->name('getCategories');
Route::get('/authors/{user}/posts', [WelcomeController::class, 'getPostsByAuthor'])->name('authorPosts');
Route::get('/authors/all', [WelcomeController::class, 'getAuthors'])->name('getAuthors');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/categories', CategoryController::class);
    Route::get('/posts/{post}/unpublish', [ArticleController::class, 'unpublish'])->name('posts.unpublish');
    Route::get('/posts/{post}/publish', [ArticleController::class, 'publish'])->name('posts.publish');
    Route::resource('/posts', ArticleController::class);
    Route::resource('/tags', TagController::class);
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
});


require __DIR__ . '/auth.php';
