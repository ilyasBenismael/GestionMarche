<?php

use App\Http\Controllers\CategoriePrixController;
use App\Http\Controllers\TypeMarcheController;
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


Route::get('/profil', 'App\Http\Controllers\HomeController@goProfil');
Route::get('/users', 'App\Http\Controllers\HomeController@goUsers');
Route::get('/', 'App\Http\Controllers\HomeController@goWelcome')->name('welcome');
Route::get('/roles', 'App\Http\Controllers\HomeController@goRoles');
Route::get('/addRole', 'App\Http\Controllers\HomeController@goAddRole');
Route::post('/addRole', 'App\Http\Controllers\HomeController@addRole');
Route::delete('/role/{id}', 'App\Http\Controllers\HomeController@deleteRole');
Route::get('/home', 'App\Http\Controllers\HomeController@goHome')->name('home');

/*-------------------------------------------------------------------------------------------------*/

/*-- == Categorie Prix -Start- == --*/
Route::get('/categoriesPrix', [CategoriePrixController::class, 'myListe'])->name('categoriePrix');
Route::post('/categoriePrix', [CategoriePrixController::class, 'store'])->name('categoriePrix.store');

Route::get('/categoriePrix/create', [CategoriePrixController::class, 'create'])->name('categoriePrix.create');

Route::get('/categoriePrix/{id}', [CategoriePrixController::class, 'show'])->name('categoriePrix.show');

Route::get('/categoriePrix/{id}/edit', [CategoriePrixController::class, 'edit'])->name('categoriePrix.edit');
Route::put('/categoriePrix/{marche}', [CategoriePrixController::class, 'update'])->name('categoriePrix.update');

Route::delete('/categoriePrix/{id}', [CategoriePrixController::class, 'destroy'])->name('categoriePrix.destroy');
/*-- == Categorie Prix -End- == --*/


/*-- == Type Marche -Start- == --*/
Route::get('/typeMarche', [TypeMarcheController::class, 'myListe'])->name('typeMarche');
Route::post('/typeMarche', [TypeMarcheController::class, 'store'])->name('typeMarche.store');

Route::get('/typeMarche/create', [TypeMarcheController::class, 'create'])->name('typeMarche.create');

Route::get('/typeMarche/{id}', [TypeMarcheController::class, 'show'])->name('typeMarche.show');

Route::get('/typeMarche/{id}/edit', [TypeMarcheController::class, 'edit'])->name('typeMarche.edit');
Route::put('/typeMarche/{marche}', [TypeMarcheController::class, 'update'])->name('typeMarche.update');


Route::delete('/typeMarche/{id}', [TypeMarcheController::class, 'destroy'])->name('typeMarche.destroy');
/*-- == Type Marche -End- == --*/





/*-------------------------------------------------------------------------------------------------*/

Auth::routes();

