<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Models\Books;
use Illuminate\Http\Request;


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
Route::post('/findBook', [BooksController::class, 'findBook'])->name('Find');


// Route::get('/findBook', function () {

//     // Check for search input
//     if (request('search')) {
//         $book = Books::where('name', 'like', '%' . request('search') . '%')->get();
//     } else {
//         $book = Books::all();
//     }

//     return view('welcome')->with('users', $book);
// });