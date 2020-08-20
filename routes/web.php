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

//Rotas de Agendamento
Route::post('/agendamento/novo', 'AgendamentosController@store');
Route::get('/agendamento/alterar/{id}', 'AgendamentosController@edit');
Route::post('/agendamento/update', 'AgendamentosController@update');
Route::get('/agendamento/historico', 'AgendamentosController@historico');
Route::post('/agendamento/cancelar', 'AgendamentosController@cancelar');
Route::post('/agendamento/concluir', 'AgendamentosController@concluir');

//Rotas para permissao Admin
Route::post('/permissao', 'AgendamentosController@index');

//Rotas Auth Scaffolding
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
