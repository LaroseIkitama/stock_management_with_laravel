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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/user/add', function () {
        return view('user.add');
    });
    Route::get('/user/list', function () {
        return view('user.list');
    });
});

Route::middleware(['auth', 'role:fournisseur'])->group(function () {
    Route::get('/entree/add', function () {
        return view('entree.add');
    });
    Route::get('/entree/list', function () {
        return view('entree.list');
    });
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
