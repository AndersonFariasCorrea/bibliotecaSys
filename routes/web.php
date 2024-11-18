<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;


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

#region Home
Route::get('/', [IndexController::class, 'index'])->name('home');
#endregion


#region Loans
Route::get('/loan', [LoanController::class, 'index'])->name('loan.index');
Route::get('/loan/create', [LoanController::class, 'create'])->name('loan.create');
Route::post('/loan/create', [LoanController::class, 'create'])->name('loan.store');
Route::get('/loan/edit/{id}', [LoanController::class, 'update'])->name('loan.edit');
Route::put('/loan/edit/{id}', [LoanController::class, 'update'])->name('loan.update');
#endregion


#region Users
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/create', [UserController::class, 'create'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'update'])->name('user.edit');
Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
#endregion


#region Book
Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/create', [BookController::class, 'create'])->name('book.store');
Route::get('/book/edit/{id}', [BookController::class, 'update'])->name('book.edit');
Route::put('/book/edit/{id}', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/delete/{id}', [BookController::class, 'delete'])->name('book.delete');
#endregion


// Language switcher
Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('lang.switch');
