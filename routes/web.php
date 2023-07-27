<?php

use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UsersController;
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


Route::get('/', [ProfileController::class, 'welcome'])->name('home');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/users/all', [UsersController::class, 'index'])->name('users');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');



    Route::get('/category/create', [CategoriesController::class, 'show'])->name('create.show');
    Route::get('/category/index', [CategoriesController::class, 'index'])->name('create.category');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::put('/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    Route::get('/contents/create', [ContentController::class, 'show'])->name('contents.show');
    Route::get('/contents', [ContentController::class, 'index'])->name('contents.index');
    Route::post('/content/create', [ContentController::class, 'store'])->name('contents.store');
    Route::put('/contents/{id}', [ContentController::class, 'update'])->name('contents.update');
    Route::delete('/contents/{id}', [ContentController::class, 'destroy'])->name('contents.destroy');


    Route::get('/tags/create', [TagController::class, 'show'])->name('tags');
    Route::get('/tags/all', [TagController::class, 'index'])->name('tags.show');
    Route::post('/tags/create', [TagController::class, 'store'])->name('tags.store');
    Route::put('/tags/{id}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');


    Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
    Route::get('comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');



    Route::get('media', [MediaController::class, 'index'])->name('media.index');
    Route::post('media/create', [MediaController::class, 'store'])->name('media.store');

});

Route::get('/about', [ProfileController::class, 'about'])->name('about');
Route::get('/contact', [ProfileController::class, 'contact'])->name('contact');