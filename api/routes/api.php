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

Route::get('/test', function (){
    $response = new \Illuminate\Http\Response(json_encode(['msg' => 'Minha Api de Energia']));
    $response->header('Content-Type','application/json');
    return $response;
});

Route::get("clientes", "ClientesController@index")->middleware('auth.basic');
Route::get("clientes/{cliente}", "ClientesController@show")->middleware('auth.basic');
Route::patch("clientes/{cliente}", "ClientesController@update")->middleware('auth.basic');
Route::post("clientes", "ClientesController@store")->middleware('auth.basic');
Route::delete("clientes/{cliente}", "ClientesController@delete")->middleware('auth.basic');

Route::get("planos", "PlanosController@index")->middleware('auth.basic');
Route::get("planos/{plano}", "PlanosController@show")->middleware('auth.basic');
Route::post("planos", "PlanosController@store")->middleware('auth.basic');
Route::patch("planos/{plano}", "PlanosController@update")->middleware('auth.basic');
Route::delete("planos/{plano}", "PlanosController@delete")->middleware('auth.basic');

Route::get("hasplanosclientes","HasPlanosController@index")->middleware('auth.basic');
Route::get("hasplanosclientes/{id}", "HasPlanosController@show")->middleware('auth.basic');
Route::patch("hasplanosclientes/{id}", "HasPlanosController@update")->middleware('auth.basic');
Route::post("hasplanosclientes", "HasPlanosController@store")->middleware('auth.basic');
Route::delete("hasplanosclientes/{id}", "HasPlanosController@destroy")->middleware('auth.basic');
