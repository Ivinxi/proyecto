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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', function () {
    echo 'tu puta madre';
});

Route::get('producto', 'ProductoController@show');

Route::get('stock', 'StockController@show');

Route::get('factura', 'FacturaController@show');

//RUTAS ADMINISTRADOR

Route::prefix('admin')->group(function(){

	Route::prefix('tallas')->group(function(){

		Route::get('/', 'TallaController@show')->name('tallas');

		Route::get('crear', function(){
			return view('forms.crearTalla');
		})->name('vistaCrearTalla');

		Route::post('insertarTalla', 'TallaController@create');

		Route::get('editarTalla/{talla}', 'TallaController@verTalla')->name('editarTalla');

		Route::post('updateTalla/{talla}', 'TallaController@update')->name('updateTalla');

		Route::get('eliminarTalla/{talla}', 'TallaController@delete')->name('eliminarTalla');
	});
});



Route::get('home', 'HomeController@index')->name('home');
