<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/v1'], function(){
	
	Route::resource('transportes', 'EmpresasController');
	Route::get('ruta/{id_ruta}','EmpresasController@getRouteBustop');
	Route::get('avenida/{id_ruta}','EmpresasController@getAvenueRoute');
	
	Route::post('login', 'Auth\ApiController@login');
	Route::post('register', 'Auth\ApiController@register');
	
});

Route::group(['prefix' => 'api/v1'], function(){
	
	Route::resource('paraderos', 'ParaderosController');

});






