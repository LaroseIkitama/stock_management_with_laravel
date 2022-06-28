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
//Access url for Admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::prefix('user')->group(function () {

        Route::get('/add', [UserController::class, 'create'])->name('user_add');
        Route::get('/list', [UserController::class, 'show'])->name('user_list');
    });
    Route::prefix('category')->group(function () {

        Route::get('/add', [CategoryController::class, 'create'])->name('category_add');
        Route::get('/list', [CategoryController::class, 'show'])->name('category_list');
    });
    Route::prefix('product')->group(function () {

        Route::get('/add', [ProductController::class, 'create'])->name('product_add');
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
