<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadesController;

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

/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Route::resource('actividades', ActividadesController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [ActividadesController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){

    Route::get('/', [ActividadesController::class, 'index'])->name('home');

});

