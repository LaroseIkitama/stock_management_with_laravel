<?php

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

    Route::get('/user/add', function () {
        return view('user.add');
    })->name('user_add');
    Route::get('/user/list', function () {
        return view('user.list');
    })->name('user_list');

    Route::get('/category/add', function () {
        return view('category.add');
    })->name('category_add');
    Route::get('/category/list', function () {
        return view('category.list');
    })->name('category_list');

    Route::get('/product/add', function () {
        return view('product.add');
    })->name('product_add');
    Route::get('/product/list', function () {
        return view('product.list');
    })->name('product_list');
});
//Access for Supplier
Route::middleware(['auth', 'role:fournisseur'])->group(function () {
    Route::get('/entree/add', function () {
        return view('entree.add');
    })->name('entry_add');
    Route::get('/entree/list', function () {
        return view('entree.list');
    })->name('entry_list');
});
//Access
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
