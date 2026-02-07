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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/sobre', 'HomeController@sobre');
Route::get('/contactos', 'HomeController@contactos');
Route::post('/enviar_contacto', 'HomeController@enviar_contacto');

Route::resource('imoveis', 'ImovelController');

Auth::routes(['register' => false]);

Route::get('distrito/{distrito}/concelho', 'DistritoController@obterConcelhos');
Route::get('concelho/{concelho}/localidade', 'ConcelhoController@obterLocalidades');
Route::get('localidade/{localidade}/codigo_postal', 'LocalidadeController@obterCodigosPostais');
