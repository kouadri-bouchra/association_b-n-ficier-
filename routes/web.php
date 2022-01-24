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
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('members', 'MembreController');

Route::resource('categories', 'CategorieController');
Route::resource('beneficiaires', 'BeneficiaireController');
Route::resource('bienfaiteure', 'BienfaiteurController');
Route::resource('product', 'ProductController');
Route::resource('list', 'ListeBController');
Route::resource('orphelin', 'orphelinController'); 
Route::resource('veuve', 'veuveController');   
Route::resource('pauvres', 'pauvresController');   
Route::resource('panier', 'PanierController');
Route::resource('attributions', 'AttributionController');
Route::resource('contenus', 'ContenusController'); 
Route::post('/{list}', 'ListeBController@searchBydate');

Route::get('/{page}', 'AdminController@index');



