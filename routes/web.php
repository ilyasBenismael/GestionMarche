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


Route::get('/profil', 'App\Http\Controllers\HomeController@goProfil');
Route::get('/users', 'App\Http\Controllers\HomeController@goUsers');
Route::get('/', 'App\Http\Controllers\HomeController@goWelcome');
Route::get('/roles', 'App\Http\Controllers\HomeController@goRoles');
Route::get('/addRole', 'App\Http\Controllers\HomeController@goAddRole');
Route::post('/addRole', 'App\Http\Controllers\HomeController@addRole');
Route::get('/home', 'App\Http\Controllers\HomeController@goHome')->name('home');

Auth::routes();

