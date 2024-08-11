<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

// Route::get('/', function () {
//     return view('books.index');
// });

// Route::resource('books', BookController::class);
// Route::resource('books', BookController::class)->parameters(['books' => 'slug'])
// ->names('books');
Route::resource('books', BookController::class)->except(['show']);
Route::get('books/{slug}', [BookController::class, 'show'])->name('books.show');
Route::get('/', [BookController::class, 'index'])->name('books.index');