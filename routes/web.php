<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\OutingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/form', function () {
    return view('partials.form');
});
//Access url for Admin
Route::middleware(['auth', 'role:ADMIN'])->group(function () {

    Route::prefix('user')->group(function () {

        Route::get('/add', [UserController::class, 'index'])->name('user_add');
        Route::get('/list', [UserController::class, 'show'])->name('user_list');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user_edit');
        Route::delete('/{user}/delete', [UserController::class, 'delete'])->name('user_delete');
        Route::put('/{user}/update', [UserController::class, 'update'])->name('user_update');
    });
    Route::prefix('category')->group(function () {

        Route::get('/add', [CategoryController::class, 'index'])->name('category_add');
        Route::get('/list', [CategoryController::class, 'show'])->name('category_list');
        Route::post('/add', [CategoryController::class, 'store'])->name('category_store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category_edit');
        Route::delete('/{category}/delete', [CategoryController::class, 'delete'])->name('category_delete');
        Route::put('/{category}/update', [CategoryController::class, 'update'])->name('category_update');
    });
    Route::prefix('product')->group(function () {

        Route::get('/add', [ProductController::class, 'index'])->name('product_add');
        Route::post('/add', [ProductController::class, 'store'])->name('product_store');
        Route::get('/list', [ProductController::class, 'show'])->name('product_list');
    });
});
//Access for Supplier
Route::middleware(['auth', 'role:SUPPLIER'])->group(function () {
    Route::prefix('entry')->group(function () {
        Route::get('/add', [EntryController::class, 'create'])->name('entry_add');
        Route::get('/list', [EntryController::class, 'show'])->name('entry_list');
    });
});
//Access for SELLER
Route::middleware(['auth', 'role:SELLER'])->group(function () {
    Route::prefix('outing')->group(function () {
        Route::get('/add', [OutingController::class, 'create'])->name('outing_add');
        Route::get('/list', [OutingController::class, 'show'])->name('outing_list');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
