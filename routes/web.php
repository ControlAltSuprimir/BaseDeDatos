<?php

use App\Http\Controllers\academicosController;
use App\Http\Controllers\actividadacademicaController;
use App\Http\Controllers\actividadextensionController;
use App\Http\Controllers\articulosController;
use App\Http\Controllers\cargosController;
use App\Http\Controllers\coloquiosController;
use App\Http\Controllers\comisionesController;
use App\Http\Controllers\indexacionesController;
use App\Http\Controllers\institucionesController;
use App\Http\Controllers\personasController;
use App\Http\Controllers\personasprogramasController;
use App\Http\Controllers\programasController;
use App\Http\Controllers\proyectosController;
use App\Http\Controllers\revistasController;
use App\Http\Controllers\tesisController;
use App\Http\Controllers\tesisinternaController;
use App\Http\Controllers\userController;
use App\Http\Controllers\viajesController;
use App\Http\Controllers\visitaController;
use App\Http\Controllers\chartController;
use App\Http\Controllers\formulariosController;

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
    return redirect('/dashboard');
})->middleware('auth');
/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');


/*Route::get('/hola', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');*/

Route::resource('academicos',academicosController::class)->middleware('auth');
Route::resource('actividadacademica',actividadacademicaController::class)->middleware('auth');
Route::resource('actividadextension',actividadextensionController::class)->middleware('auth');
Route::resource('articulos',articulosController::class)->middleware('auth');
Route::resource('cargos',cargosController::class)->middleware('auth');
Route::resource('coloquios',coloquiosController::class)->middleware('auth');
Route::resource('comisiones',comisionesController::class)->middleware('auth');
Route::resource('indexaciones',indexacionesController::class)->middleware('auth');
Route::resource('instituciones',institucionesController::class)->middleware('auth');
Route::resource('personas',personasController::class)->middleware('auth');
Route::resource('personasprogramas',personasprogramasController::class)->middleware('auth');
Route::resource('programas',programasController::class)->middleware('auth');
Route::resource('proyectos',proyectosController::class)->middleware('auth');
Route::resource('revistas',revistasController::class)->middleware('auth');
Route::resource('tesis',tesisController::class)->middleware('auth');
Route::resource('tesisintera',tesisinternaController::class)->middleware('auth');
Route::resource('user',userController::class)->middleware('auth');
Route::resource('viajes',viajesController::class)->middleware('auth');
Route::resource('visita',visitaController::class)->middleware('auth');


//gráficos

Route::get('/',[chartController::class,'show'])->middleware('auth');
Route::get('/dashboard',[chartController::class,'show'])->middleware('auth');
Route::get('/graficos/articulos',[chartController::class,'articulos'])->middleware('auth');
Route::get('/graficos',[chartController::class,'articulos'])->middleware('auth');


//formularios

Route::get('/formularios',[formulariosController::class,'index'])->middleware('auth');

Route::get('/formularios/viaje',[formulariosController::class,'viaje']);
Route::post('/formularioviaje', [formulariosController::class,'storeviaje']);


//pendientes

Route::get('/viajespendientes',[formulariosController::class,'viajespendientes'])->middleware('auth');
Route::get('/viajespendientes/{id}',[formulariosController::class,'viajespendientesshow'])->middleware('auth');
Route::get('/viajespendientes/{id}/process',[formulariosController::class,'viajeprocesado'])->middleware('auth');