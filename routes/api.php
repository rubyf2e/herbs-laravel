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

Route::get('/', 'IndexController@index');
Route::get('maps', 'IndexController@index');
Route::get('sliders', 'IndexController@index');
Route::get('sidebars', 'IndexController@index');
Route::get('details', 'IndexController@index');

Route::post('maps', 'MapsController@index');
Route::post('maps/updatePosition', 'MapsController@updatePosition');
Route::post('sliders', 'SlidersController@index');
Route::post('sidebars', 'SidebarsController@index');
Route::post('details', 'DetailsController@index');

