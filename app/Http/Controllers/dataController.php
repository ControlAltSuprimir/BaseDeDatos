<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\Academicos;
use App\Models\Personas;
use App\Models\Revistas;
use App\Models\ProyectosActividadesAcademicas;
use Illuminate\Http\Request;

use DB;

class dataController extends Controller
{

    public function articulos()
    {
        $listaArticulos = Articulos::where('is_valid', '=', 1)->where('estado_publicacion', '=', 'publicado')->get();

        foreach ($listaArticulos as $articulo) {
            DB::table('lista_articulos')->insert(
                array(
                    'id_articulo' => $articulo->id,
                    'titulo' => $articulo->titulo,
                    'autores' => $articulo->autoresNoLink(),
                    'revista' => $articulo->revista->nombre,
                    'ano' => $articulo->fecha_publicacion
                )
            );
        }

        return 'artículos insertados';
    }


    public function academicos()
    {
        require(__DIR__ . '/../../Helpers/Persona/datosPersonales.php');
        require(__DIR__ . '/../../Helpers/Articulos/arrayArticulos.php');
        $listaAcademicos = Academicos::where('is_valid','=',1)->get();


        //
        //$robert = $listaAcademicos->where('id','=',6)->first();
        //return $robert->persona->articulos()->take(10)->get();
        //$robert->persona->articulos()->where('articulos.estado_publicacion','=','publicado')->orderBy('fecha_publicacion','desc')->take(10)->get()
        //return articulosHTML($robert->persona->articulos()->where('articulos.estado_publicacion','=','publicado')->orderBy('fecha_publicacion','desc')->take(10)->get(),'latest');
        foreach($listaAcademicos as $robert){
        
        DB::table('lista_academicos')->updateOrInsert(
            ['id_academico' => $robert->id],
            array(
                'datos_personales' => $robert->persona->full_name(),
                'articulos' => articulosHTML($robert->persona->articulos()->where('articulos.estado_publicacion','=','publicado')->orderBy('fecha_publicacion','desc')->take(10)->get(),'latest'),
                'proyectos' => null
            )
        );}
        return DB::table('lista_academicos')->where('id_academico','=',6)->get()->first()->articulos;
    }
}
