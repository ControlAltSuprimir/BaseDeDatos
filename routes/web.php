<?php

use App\Http\Controllers\academicosController;
use App\Http\Controllers\actividadacademicaController;
use App\Http\Controllers\actividadextensionController;
use App\Http\Controllers\articulosController;
use App\Http\Controllers\cargosController;
use App\Http\Controllers\coloquiosController;
use App\Http\Controllers\comisionesController;
use App\Http\Controllers\cursoController;
use App\Http\Controllers\financiamientoController;
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
use App\Http\Controllers\alumnosController;
use App\Http\Controllers\estudiantesController;

// guardar datos
use App\Http\Controllers\dataController;
use App\Http\Controllers\sincronizacionController;
//Correos
use App\Mail\Notificacion;

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

Route::middleware(['auth'])->group(function(){



Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/soporte', function () {
    return view('website/soporte');
})->name('dashboard');



Route::resource('academicos',academicosController::class);
Route::resource('actividadacademica',actividadacademicaController::class);
Route::resource('actividadextension',actividadextensionController::class);
Route::resource('articulos',articulosController::class);
Route::resource('cargos',cargosController::class);
Route::resource('coloquios',coloquiosController::class);
Route::resource('cursos',cursoController::class);
Route::resource('comisiones',comisionesController::class);
Route::resource('indexaciones',indexacionesController::class);
Route::resource('instituciones',institucionesController::class);
Route::resource('personas',personasController::class);
Route::resource('personasprogramas',personasprogramasController::class);
Route::resource('programas',programasController::class);
Route::resource('proyectos',proyectosController::class);
Route::resource('revistas',revistasController::class);
Route::resource('tesis',tesisController::class);
Route::resource('tesisintera',tesisinternaController::class);
Route::resource('user',userController::class);
Route::resource('viajes',viajesController::class);
Route::resource('visita',visitaController::class);


//estudiantes
Route::resource('estudiantes', estudiantesController::class)->except([
    'index'
]);

Route::get('/docencia/{estudiantes}',[estudiantesController::class,'index']);
Route::get('/docencia/{estudiantes}/{programa}',[estudiantesController::class,'indexPrograma']);


//gráficos
Route::get('/graficos/articulos',[chartController::class,'losArticulos']);
Route::get('/graficos',[chartController::class,'losArticulos']);
Route::get('/',[chartController::class,'show']);
Route::get('/dashboard',[chartController::class,'show']);
Route::get('/graficos/financiamiento',[chartController::class,'losFinanciamientos']);



//pendientes

Route::get('/viajespendientes',[formulariosController::class,'viajespendientes']);
Route::get('/viajespendientes/{id}',[formulariosController::class,'viajespendientesshow']);
Route::get('/viajespendientes/{id}/process',[formulariosController::class,'viajeprocesado']);


//sincronización
Route::get('/sincronizacion',[sincronizacionController::class,'index']);
Route::get('/sincronizacion/articulos', [sincronizacionController::class,'articulos']);
Route::get('/sincronizacion/academicos', [sincronizacionController::class,'academicos']);


//financiamiento

Route::get('/financiamiento', function(){
    return view('financiamiento.index');
});
Route::get('/financiamiento/actividades',[financiamientoController::class,'actividades']);


}); //Se termina la agrupación de autentificación



//formularios (no es necesario estar registrado)

Route::get('/formularios',[formulariosController::class,'index']);
Route::get('/formularios/viaje',[formulariosController::class,'viaje']);
Route::post('/formularioviaje', [formulariosController::class,'storeviaje']);



//mails
/*
Route::get('/correo',[Notificacion::class,'nuevoUsuario']);

//guardar datos
Route::get('/guardararticulos',[dataController::class,'articulos']);
Route::get('/mostraracademicos',[dataController::class,'academicos']);
*/