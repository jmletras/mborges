<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PublicWhistleReportController;
use App\Http\Controllers\AdminWhistleReportController;

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

/* Público */
Route::get('/denuncias', [PublicWhistleReportController::class, 'create']);
Route::post('/denuncias', [PublicWhistleReportController::class, 'store']);
Route::get('/denuncias/obrigado/{uuid}', [PublicWhistleReportController::class, 'thankYou'])
  ->name('whistle.thankyou');
Route::get('/denuncias/acompanhar', [PublicWhistleReportController::class, 'show']);
Route::post('/denuncias/{uuid}/responder', [PublicWhistleReportController::class, 'reply']);
Route::view('/denuncias/politica', 'whistle.politica');
Route::get('/denuncias/acompanhar-form', function () {
  return view('whistle.public.acompanhar');
});

/* Admin */
Route::prefix('admin/denuncias')->middleware('auth')->group(function () {
  Route::get('/', [AdminWhistleReportController::class, 'index']);
  Route::get('/{id}', [AdminWhistleReportController::class, 'show']);
  Route::post('/{id}/responder', [AdminWhistleReportController::class, 'reply']);
});
