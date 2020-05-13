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

//RUTAS ADMIN

Route::prefix('admin')->group(function(){

	Route::prefix('tallas')->group(function(){

		Route::get('/', 'TallaController@show')->name('admin/tallas');

		Route::get('create', function(){
			return view('admin.tallas.create_talla');
		})->name('admin/tallas/create');

		Route::post('insert', 'TallaController@create')->name('admin/tallas/insert');

		Route::get('edit/{talla}', 'TallaController@edit')->name('admin/tallas/edit');

		Route::post('update/{talla}', 'TallaController@update')->name('admin/tallas/update');

		Route::get('delete/{talla}', 'TallaController@delete')->name('admin/tallas/delete');
	});
});

Route::get('home', 'HomeController@index')->name('home');