<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsPostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [NewsPostsController::class, 'public_index'])->name('public_view');




Route::get("category", [CategoryController::class, 'index'])->name('category');

Route::get("categories", [CategoryController::class, 'create_form'])->name('add_category');
Route::post("categories", [CategoryController::class, 'store'])->name('store_category');


Route::get("categories/update/{id}", [CategoryController::class, 'update_form'])->name('update_category');
Route::post("categories/update/{id}", [CategoryController::class, 'update'])->name('update');


Route::get("categories/delete", [CategoryController::class, 'delete'])->name('delete_category');



Route::get("all/post", [NewsPostsController::class, 'index'])->name('all-post');
Route::get("post/{id}", [NewsPostsController::class, 'show'])->name('show-post');

Route::get("create/post", [NewsPostsController::class, 'create_view'])->name('create-post');
Route::post("create/post", [NewsPostsController::class, 'store'])->name('create-post');

Route::get("view/post/{id}", [NewsPostsController::class, 'view'])->name('view-post');
Route::get("like/post/{id}", [NewsPostsController::class, 'like'])->name('like-post');


Route::get("active/post/{id}", [NewsPostsController::class, 'active_post'])->name('active-post');
Route::get("inactive/post/{id}", [NewsPostsController::class, 'inactive_post'])->name('inactive-post');



Route::get("update/post/{id}", [NewsPostsController::class, 'update_view'])->name('update-post');
Route::post("update/post/{id}", [NewsPostsController::class, 'update'])->name('update-post');

Route::get("delete/post/{id}", [NewsPostsController::class, 'destroy'])->name('delete-post');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
