<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\TopsisController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('cafe', CafeController::class);
Route::post('/cafe/import', [CafeController::class, 'importData'])->name('cafe.importData');
Route::get('/cafe', [CafeController::class, 'index'])->name('cafe.index');
Route::resource('kriteria', KriteriaController::class);
Route::get('/topsis', [TopsisController::class, 'index'])->name('topsis.index');
Route::get('/topsis/normalize', [TopsisController::class, 'indexNormalize'])->name('topsis.indexNormalize');
Route::get('/topsis/weight', [TopsisController::class, 'indexWeight'])->name('topsis.indexWeight');
Route::get('/topsis/positive', [TopsisController::class, 'indexPositive'])->name('topsis.indexPositive');
Route::get('/topsis/negative', [TopsisController::class, 'indexNegative'])->name('topsis.indexNegative');
Route::get('/topsis/distances', [TopsisController::class, 'indexDistances'])->name('topsis.indexDistances');
Route::get('/topsis/preferences', [TopsisController::class, 'indexPreferences'])->name('topsis.indexPreferences');
