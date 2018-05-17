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
    Route::resource('calidadAire', 'CalidadAireController');
});
//Auth::routes();

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => ['auth:api']], function() {

    //Route::get('/getAirQuality/{lat}/{long}', 'TestController@getAirQuality');

});

Route::get('/getAirQuality/{lat}/{long}', 'API_Dependencies\AirQualityController@getAirQuality');

/*
 * Api's DataVehicles
 *
 */

Route::get('/getFines/{plates}', 'API_Dependencies\DataVehiclesController@getFines');
Route::get('/getHoldingInformation/{plates}', 'API_Dependencies\DataVehiclesController@getHoldingInformation');
