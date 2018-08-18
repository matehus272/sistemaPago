<?php

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


Route::get('vista', function(){
	 return view('alerts.success');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listaParticipante', 'vacacionesController@listaParticipante');
Route::get('/crearParticipante', 'vacacionesController@crearParticipante')->middleware('admin');
Route::post('/crearParticipante', 'vacacionesController@saveParticipante')->middleware('admin');
Route::get('/registroSemana', 'vacacionesController@registroSemana')->middleware('admin');
Route::post('/registroSemana', 'vacacionesController@saveRegistroSemana')->middleware('admin');
Route::get('/controlSemanal', 'vacacionesController@controlSemanal');
Route::get('/registroPago', 'vacacionesController@registroPago')->middleware('admin');
Route::post('/registroPago', 'vacacionesController@saveRegistroPago')->middleware('admin');
Route::get('/historial/{id}', 'vacacionesController@historial');

