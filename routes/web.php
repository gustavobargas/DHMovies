<?php

use App\Genre;
use App\Http\Middleware\AdminMiddleware;

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

//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/users', 'UserController@index');

//Route::view('/', 'home')->middleware('auth');
Route::get('/', 'HomeController@index')->middleware('auth');

Route::get('/backoffice', 'BackofficeController@index')->middleware('admin:admin');


Route::get('/genremovies', 'GenreMovieController@index')->name('genremovies');

Route::get('/movies/buscar', 'GenreMovieController@search')->name('buscar');

// Movies
Route::get('/movies', 'MovieController@index')->name('index');
// Esta ruta va por get, y apunta al metodo del controlador que va a devolver el form
Route::get('/movies/create', 'MovieController@create');

// Esta ruta TIENE LA MISMA URL QUE LA ANTERIOR, PERO va por POST, 
// y apunta al metodo del controlador que va a insertar el recurso en la base de datos
Route::post('/movies/create', 'MovieController@store');

Route::get('/movies/{id}', 'MovieController@show');
Route::get('/movies/{id}/edit', 'MovieController@edit')->middleware('admin:admin');
Route::patch('/movies/{id}/edit', 'MovieController@update');

// Genres
Route::get('/genres', 'GenreController@index');
Route::get('/genres/{id}/movies', 'GenreController@showMovies');
Route::get('/genres/{id}', 'GenreController@show');

// Metodo resource, crea todas las rutas siguiendo las convenciones de resource
// creando tambien un name para cada una
Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'role:admin'], function() {
    Route::get('/admin', function() {
       return 'Welcome Admin';
    });
 });
