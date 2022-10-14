<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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

Route::get('add', function () {
    return view('add_books');
});


Route::get('update/{id}', [BooksController::class, 'update'])->name('up');


Route::get('/index', [BooksController::class, 'index']);

Route::post('/req', [BooksController::class, 'store'])->name('req');
Route::get('/delete/{id}', [BooksController::class, 'destroy'])->name('delete');
Route::put('/put/{id}', [BooksController::class, 'updateBook'])->name('put');