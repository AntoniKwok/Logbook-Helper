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

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\LogbookController::class, 'index'])->name('dashboard');
Route::get('/dashboard/addlog', [App\Http\Controllers\LogbookController::class, 'addlog'])->name('dashboard.addlog');
Route::post('/dashboard/addlog', [App\Http\Controllers\LogbookController::class, 'storelog'])->name('dashboard.storelog');
Route::post('/dashboard/update-log', [App\Http\Controllers\LogbookController::class, 'updateLog'])->name('dashboard.updateLog');
