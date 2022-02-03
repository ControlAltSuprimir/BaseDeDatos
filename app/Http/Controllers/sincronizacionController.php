<?php

namespace App\Http\Controllers;


use App\Models\Articulos;
use App\Models\Academicos;
use App\Models\Proyectos;
use App\Models\PersonaProyecto;
use Illuminate\Http\Request;

use DB;

class sincronizacionController extends Controller
{
    //
    public function index()
    {
        //
        return view('sincronizacion.index');
    }

    public function articulos()
    {
        // borramos la table anterior
        DB::table('lista_articulos')->delete();


        //creamos nuevamente la tabla
        $listaArticulos = Articulos::where('is_valid', '=', 1)->where('estado_publicacion', '=', 'publicado')->get();


        foreach ($listaArticulos as $articulo) {
            if (is_null($articulo->fecha_publicacion) || is_null($articulo->titulo)) {
            } else {
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
        }

        $mensaje = array(
            'titulo' => 'Sincronizacion exitosa',
            'contenido' => 'Se actualizaron todos los datos respecto a los articulos',
            'icono' => '',
            'boton' => 'Cerrar'
        );
        return redirect('sincronizacion')->with('success', $mensaje);
    }


    public function academicos()
    {
        require(__DIR__ . '/../../Helpers/Persona/datosPersonales.php');
        require(__DIR__ . '/../../Helpers/Articulos/arrayArticulos.php');
        require(__DIR__ . '/../../Helpers/Proyectos/arrayProyectos.php');
        $listaAcademicos = Academicos::where('is_valid', '=', 1)->get();




        foreach ($listaAcademicos as $robert) {

            //
            // Ordenando proyectos por académico
            //

            $myArray = [];

            $proyectosResponsables = Proyectos::where('is_valid', '=', 1)
                ->where('investigador_responsable', '=', $robert->id_Persona)
                ->get();

            foreach ($proyectosResponsables as $proyecto) {
                $row = array(
                    'proyecto' => $proyecto->titulo,
                    'rol' => "Investigador Responsable",
                    'codigo' => $proyecto->codigo_proyecto,
                    'fecha' => $proyecto->intervalo(),
                );
                $myArray[] = $row;
            }

            $otroProyectos = PersonaProyecto::where('is_valid', '=', 1)
                ->where('id_persona', '=', $robert->id_Persona)
                ->get();
            foreach ($otroProyectos as $proyecto) {
                $row = array(
                    'proyecto' => $proyecto->elProyecto->titulo,
                    'rol' => $proyecto->participacion,
                    'codigo' => $proyecto->elProyecto->codigo_proyecto,
                    'fecha' => $proyecto->fecha,
                );
                $myArray[] = $row;
            }

            //
            //Escribiendo la lista
            //

            DB::table('lista_academicos')->updateOrInsert(
                ['id_academico' => $robert->id],
                array(
                    'datos_personales' => $robert->persona->full_name(),
                    'articulos' => articulosHTML($robert->persona->articulos()->where('articulos.estado_publicacion', '=', 'publicado')->where('articulos.is_valid', '=', 1)->orderBy('fecha_publicacion', 'desc')->take(20)->get(), 'latest'),
                    'proyectos' => proyectosArrayHTML($myArray),
                    'area_investigacion' => $robert->area_investigacion,
                    'estudios' => $robert->estudios,
                    'email' => $robert->persona->email,
                    'encode' => urlencode($robert->persona->primer_nombre . $robert->persona->primer_apellido . $robert->persona->segundo_apellido) //generando link personal
                )
            );
        }

        $mensaje = array(
            'titulo' => 'Sincronizacion exitosa',
            'contenido' => 'Se actualizaron todos los datos respecto a los articulos',
            'boton' => 'Cerrar'
        );
        return redirect('sincronizacion')->with('success', $mensaje);
    }
}
