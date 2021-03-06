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

Route::get('/', 'Controller@index')->name('/');

Route::get('target/{target}', 'ProductoController@target')->name('target');

Route::get('target/{target}/categoria/{categoria}', 'ProductoController@categoria')->name('categoria');

Route::get('target/{target}/categoria/{categoria}/producto/{producto}', 'ProductoController@producto')->name('producto.view');

Route::post('anadirCarrito/{producto}', 'StockController@anadirCarrito')->name('anadirCarrito');

Route::post('buscar', 'ProductoController@buscar')->name('buscar');

//RUTAS USUARIO

Route::get('perfil', 'UsuarioController@perfil')->name('perfil');

Route::get('perfil/actualizar', 'UsuarioController@perfil')->name('actualizar');

Route::post('perfil/update', 'UsuarioController@updatePerfil')->name('perfil/update');

Route::get('perfil/facturas', 'UsuarioController@facturasUsuario')->name('facturas');

Route::get('downloadPDF/{ruta}', 'FacturaController@downloadPDF')->name('downloadPDF');

//RUTAS COMPRA

Route::get('mostrarCarrito', 'StockController@mostrarCarrito')->name('mostrarCarrito');

Route::get('eliminarCarrito/{id}', 'StockController@eliminarItemCarrito')->name('eliminarCarrito');

Route::get('procesarCompra', 'StockController@procesarCompra')->name('procesarCompra');

Route::post('pago', 'FacturaController@pago')->name('pago');

//RUTAS ADMIN

Route::group(['prefix' => 'admin', 'middleware' => 'admin_vendedor'], function(){

	Route::get('home', function(){
		return view('admin.admin');
	})->name('admin/home');

	Route::prefix('tallas')->group(function(){

		Route::get('/', 'TallaController@show')->name('admin/tallas');

		Route::post('insert', 'TallaController@create')->name('admin/tallas/insert');

		Route::get('edit/{talla}', 'TallaController@edit')->name('admin/tallas/edit');

		Route::post('update/{talla}', 'TallaController@update')->name('admin/tallas/update');

		Route::get('delete/{talla}', 'TallaController@delete')->name('admin/tallas/delete');

		Route::get('restore/{id_talla}', 'TallaController@restore')->name('admin/tallas/restore');
	});
	
	Route::prefix('colors')->group(function(){

		Route::get('/', 'ColorController@show')->name('admin/colors');

		Route::post('insert', 'ColorController@create')->name('admin/colors/insert');

		Route::get('edit/{color}', 'ColorController@edit')->name('admin/colors/edit');

		Route::post('update/{color}', 'ColorController@update')->name('admin/colors/update');

		Route::get('delete/{color}', 'ColorController@delete')->name('admin/colors/delete');

		Route::get('restore/{id_color}', 'ColorController@restore')->name('admin/colors/restore');
	});

	Route::prefix('usuarios')->group(function(){

		Route::get('/', 'UsuarioController@show')->name('admin/usuarios');

		Route::post('insert', 'UsuarioController@create')->name('admin/usuarios/insert')->middleware('admin');

		Route::get('edit/{usuario}', 'UsuarioController@edit')->name('admin/usuarios/edit')->middleware('admin');

		Route::post('update/{usuario}', 'UsuarioController@update')->name('admin/usuarios/update')->middleware('admin');

		Route::get('delete/{usuario}', 'UsuarioController@delete')->name('admin/usuarios/delete')->middleware('admin');

		Route::get('restore/{id_usuario}', 'UsuarioController@restore')->name('admin/usuarios/restore')->middleware('admin');
	});
		
	Route::prefix('productos')->group(function(){

		Route::get('/', 'ProductoController@show')->name('admin/productos');

		Route::post('insert', 'ProductoController@create')->name('admin/productos/insert');

		Route::get('edit/{producto}', 'ProductoController@edit')->name('admin/productos/edit');

		Route::post('update/{producto}', 'ProductoController@update')->name('admin/productos/update');

		Route::get('delete/{producto}', 'ProductoController@delete')->name('admin/productos/delete');

		Route::get('restore/{id_producto}', 'ProductoController@restore')->name('admin/productos/restore');

		Route::post('insertStock', 'StockController@create')->name('admin/productos/insertStock');

		Route::get('deleteStock/{stock}', 'StockController@delete')->name('admin/productos/deleteStock');
	});

	Route::prefix('facturas')->group(function(){

		Route::get('/', 'FacturaController@show')->name('admin/facturas');

	});
});