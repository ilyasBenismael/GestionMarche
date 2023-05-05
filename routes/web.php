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


Route::get('/profil', 'App\Http\Controllers\ProfilController@goProfil');

Route::get('/', 'App\Http\Controllers\WelcomeController@goWelcome')->name('welcome');

Route::get('/roles', 'App\Http\Controllers\RoleController@goRoles');
Route::get('/addRole', 'App\Http\Controllers\RoleController@goAddRole');
Route::post('/addRole', 'App\Http\Controllers\RoleController@addRole');
Route::delete('/role/{id}', 'App\Http\Controllers\RoleController@deleteRole');

Route::get('/users', 'App\Http\Controllers\UsersController@goUsers');
Route::get('/user/{id}', 'App\Http\Controllers\UsersController@goUpdateUser');
Route::put('/user/{id}', 'App\Http\Controllers\UsersController@updateUser');
Route::delete('/user/{id}', 'App\Http\Controllers\UsersController@deleteUser');

Route::get('/ChangePassword/{id}', 'App\Http\Controllers\UsersController@goChangePassword');
Route::post('/ChangePassword/{id}', 'App\Http\Controllers\UsersController@ChangePassword');

Route::post('/dowload/{cv}', 'App\Http\Controllers\UsersController@DownloadCv');
Route::post('/importUsers', 'App\Http\Controllers\UsersController@ImportUsers');


Route::get('/home', 'App\Http\Controllers\HomeController@goHome')->name('home');

Auth::routes();

