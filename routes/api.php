<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ListaArticulosController;
use App\Http\Controllers\Api\V1\ListaAcademicosController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// VERSION 1 (V1)


//Artículos del Departamento
Route::get('v1/articulos', [ListaArticulosController::class,'index']);
Route::get('v1/articulos/{ano}', [ListaArticulosController::class,'articulosPorAno']);
//Route::apiResource('v1/articulos',ListaArticulosController::class)->only('index');

//Acádemicos del Departamento
Route::get('v1/academicos', [ListaAcademicosController::class,'index']);
Route::get('v1/academicos/{show}', [ListaAcademicosController::class,'show']);
Route::get('v1/academicos/encode/{encode}', [ListaAcademicosController::class,'showEncode']);