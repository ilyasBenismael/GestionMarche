<?php

use App\Http\Controllers\AttachementController;
use App\Http\Controllers\CategoriePrixController;
use App\Http\Controllers\ConcurrentController;
use App\Http\Controllers\EffectController;
use App\Http\Controllers\PrixController;
use App\Http\Controllers\TypeMarcheController;
use App\Models\appeloffre;
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


Route::get('/chat/{hisid}', 'App\Http\Controllers\ChatController@goChat');
Route::post('/sendMessage/{chatid}/{hisid}', 'App\Http\Controllers\ChatController@sendMessage')->name('sendMessage');





//Marchees
Route::get('/marchelist', 'App\Http\Controllers\MarcheController@goMarcheList')->name('marcheList');
Route::get('/addMarche', 'App\Http\Controllers\MarcheController@goAddMarche');
Route::post('/addMarche', 'App\Http\Controllers\MarcheController@addMarche');














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

/*-- == Concurrent -Start- == --*/
Route::get('/concurrent', [ConcurrentController::class, 'myListe'])->name('concurrent');
Route::post('/concurrent', [ConcurrentController::class, 'store'])->name('concurrent.store');


Route::get('/concurrent/create/{appeloffre}', [ConcurrentController::class, 'create'])->name('concurrent.create');

Route::get('/concurrent/{id}', [ConcurrentController::class, 'show'])->name('concurrent.show');

Route::get('/concurrent/{id}/edit', [ConcurrentController::class, 'edit'])->name('concurrent.edit');
Route::put('/concurrent/{nom}', [ConcurrentController::class, 'update'])->name('concurrent.update');


Route::delete('/concurrent/{id}', [ConcurrentController::class, 'destroy'])->name('concurrent.destroy');
/*-- == Concurrent -End- == --*/


/*-- == Appel Offre -start- == --*/

Route::get('/appeloffre/{id}', function ($id) {
    $appelOffres = AppelOffre::with('concurrents')->find($id);
    $concurrents = $appelOffres->concurrents;

    return view('appeloffres.show', compact('appelOffres', 'concurrents'));
})->name('appeloffre');

/*-- == Appel Offre -end- == --*/

/*-- == Effects -start- == --*/
Route::get('/effects', [EffectController::class, 'effects'])->name('effects');
/*-- == Effects -end- == --*/

/*-- == Attachement -Start- == --*/

Route::get('/attachement', [AttachementController::class, 'myListe'])->name('attachement');
Route::post('/attachement', [AttachementController::class, 'store'])->name('attachement.store');


Route::get('/attachement/create/{marche}', [AttachementController::class, 'create'])->name('attachement.create');

Route::get('/attachement/{id}', [AttachementController::class, 'show'])->name('attachement.show');

Route::get('/attachement/{id}/edit', [AttachementController::class, 'edit'])->name('attachement.edit');
Route::put('/attachement/{numero}', [AttachementController::class, 'update'])->name('attachement.update');


Route::delete('/attachement/{id}', [AttachementController::class, 'destroy'])->name('attachement.destroy');
/*-- == Attachement -End- == --*/

/*-- == Prix -Start- == --*/

Route::get('/prix', [PrixController::class, 'myListe'])->name('prix');
Route::post('/prix', [PrixController::class, 'store'])->name('prix.store');


Route::get('/prix/create/{marche}', [PrixController::class, 'create'])->name('prix.create');

Route::get('/prix/{id}', [PrixController::class, 'show'])->name('prix.show');

Route::get('/prix/{id}/edit', [PrixController::class, 'edit'])->name('prix.edit');
Route::put('/prix/{numero}', [PrixController::class, 'update'])->name('prix.update');


Route::delete('/prix/{id}', [PrixController::class, 'destroy'])->name('prix.destroy');
/*-- == Prix -End- == --*/




/*-------------------------------------------------------------------------------------------------*/

Auth::routes();

