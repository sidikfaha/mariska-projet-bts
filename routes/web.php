<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/users', [HomeController::class, 'users'])->name('users');
Route::get('/users/add', [UserController::class, 'create'])->name('users.add');
Route::get('/demandes', [HomeController::class, 'demandes'])->name('trans');
Route::get('/admin_demandes', [HomeController::class, 'adminTransactions'])->name('trans_admin');
Route::get('/demandes/add', [TransactionController::class, 'create'])->name('trans.add');

Route::prefix('action')->group(function () {
    Route::post('users', [UserController::class, 'store'])->name('users.create');
    Route::post('trans', [TransactionController::class, 'store'])->name('trans.create');
    Route::post('trans_admin', [TransactionController::class, 'update'])->name('trans.update');

});
