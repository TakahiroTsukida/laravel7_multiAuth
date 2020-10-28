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

// 一般ユーザー側
Route::namespace('Frontend')->prefix('/frontend')->name('frontend.')->group(function () {
    Auth::routes();

    Route::middleware('auth:user')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });
});


// 管理ユーザー側
Route::namespace('Backend')->prefix('/backend')->name('backend.')->group(function () {

    Auth::routes();

    Route::middleware('auth:admin')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });
});
