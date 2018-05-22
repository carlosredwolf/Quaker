<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
   return $request->user();
});
Route::group(['prefix' => 'quaker', 'middleware' => 'auth:api'], function() {
   Route::resource('vehiculo', 'VehiculoController');
   Route::resource('servicioMantenimiento', 'ServicioMantenimientoController');
   Route::resource('foto', 'FotoController');
   Route::resource('calidadAire', 'CalidadAireController');
   Route::get('/getAirQuality/{lat}/{long}', 'API_Dependencies\AirQualityController@getAirQuality');
   Route::resource('verificacion', 'VerificacionController');
   Route::resource('poliza', 'PolizaSeguroController');
});
//Auth::routes();
//Route::get('agrega', ['as' => 'agrega', 'uses' => '']);

Route::post('register', ['as' => 'register', 'uses' =>'Auth\RegisterController@register']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);


Route::group(['middleware' => ['auth:api']], function() {

   //Route::get('/getAirQuality/{lat}/{long}', 'TestController@getAirQuality');

});
