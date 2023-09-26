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

Route::get('/keluar',function(){
    \Auth::logout();

    return redirect('login');
});

//input data masyarakat

    Route::group(['middleware'=>'auth'],function(){
    Route::get('/data','\App\Http\Controllers\Data_controller@index');
    Route::get('/data/add','\App\Http\Controllers\Data_controller@add');
    Route::post('/data/add','\App\Http\Controllers\Data_controller@store');
    Route::get('/data/{id}','\App\Http\Controllers\Data_controller@edit');
    Route::put('/data/{id}','\App\Http\Controllers\Data_controller@update');
    Route::delete('/data/{id}','\App\Http\Controllers\Data_controller@delete');
    Route::post('/datas/{id}','\App\Http\Controllers\Data_controller@post');

// Laporan data masyarakat
    Route::get('/laporan','\App\Http\Controllers\Laporan_controller@index');
    Route::get('/laporan/filter','\App\Http\Controllers\Laporan_controller@filter');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
