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

Route::get('/prueba', function () {
    echo 'tu puta madre';
});

Route::get('/producto', 'ProductoController@show');

Route::get('/talla', 'TallaController@show');

Route::get('/stock', 'StockController@show');

Route::get('/factura', 'FacturaController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
