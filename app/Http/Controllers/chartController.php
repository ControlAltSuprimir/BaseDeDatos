<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulos;
use App\Models\Academicos;
use App\Models\Proyectos;
use App\Models\Coloquios;

class chartController extends Controller
{
    //
    public function show()
    {
        //
        //Estadísticas básicas
        //


        // Publicaciones
        $articulos = Articulos::with('revista')->where('is_valid', '=', 1)->where('estado_publicacion', '=', 'publicado')->get();

        //Artículos Pendientes
        $pendientes = Articulos::where('is_valid', '=', 1)
            ->where(function ($query) {
                $query->where('estado_publicacion', '!=', 'publicado')
                    ->orWhereNull('estado_publicacion');
            })
            ->get();
        //->where('estado_publicacion','!=','publicado')

        $articulosPendientes = count($pendientes);

        //Miembros del Departamento
        $academicos = Academicos::where('is_valid', '=', 1)->get();

        //Proyectos
        $proyectos = Proyectos::where('is_valid', '=', 1)->get();

        //Coloquios
        $coloquios = Coloquios::where('is_valid', '=', 1)
            ->whereDate('fecha', '<=', now())
            ->get();

        $estadisticas = [];
        $estadisticas['articulos'] = count($articulos);
        $estadisticas['academicos'] = count($academicos);
        $estadisticas['proyectos'] = count($proyectos);
        $estadisticas['coloquios'] = count($coloquios);


        //
        // Estructura de gráfico de publicaciones
        //

        $baseArray = array(
            'B' => 0,
            'MB' => 0,
            'R' => 0,
            'Sin Calificar' => 0
        );

        //Proyectos y Publicaciones los últimos 13 años
        $anoActual = date("Y");
        $publicados = [];
        $articulosPorAno = [];
        $proyectosActivosPorAno = [];
        $proyectosAdjudicadosPorAno = [];
        for ($i = 12; $i >= 0; $i--) {
            $index = $anoActual - $i;
            $articulosPorAno[$index] = $baseArray;
            $proyectosActivosPorAno[$index] = 0;
            $proyectosAdjudicadosPorAno[$index] = 0;
            $publicados[] = $index;
        }
        $anosPublicados = "'" . implode("','", $publicados) . "'";


        $clasificacionActual = $baseArray;
        $chart = $baseArray;
        $chart2 = $baseArray;



        //Armando gráfico de Publicaciones
        foreach ($articulos as $articulo) {
            if ($articulo->fecha_publicacion <= $anoActual && $articulo->fecha_publicacion >= $anoActual - 12) {
                if (isset($articulo->revista)) {
                    if ($articulo->clasificacion() == 'B') {
                        $articulosPorAno[$articulo->fecha_publicacion]['B'] += 1;
                    } elseif ($articulo->clasificacion() == 'R') {
                        $articulosPorAno[$articulo->fecha_publicacion]['R'] += 1;
                    } elseif ($articulo->clasificacion() == 'MB') {
                        $articulosPorAno[$articulo->fecha_publicacion]['MB'] += 1;
                    } else {
                        $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] += 1;
                    }
                } else {
                    $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] += 1;
                }
            }
        }

        //Este array es distinto al $$basearray definido anteriormente
        $chart3 = array(
            'B' => [],
            'MB' => [],
            'R' => [],
            'Sin Calificar' => []
        );


        foreach ($articulosPorAno as $index => $elAno) {
            $chart3['B'][$index] = $elAno['B'];
            $chart3['MB'][$index] = $elAno['MB'];
            $chart3['R'][$index] = $elAno['R'];
            $chart3['Sin Calificar'][$index] = $elAno['Sin Calificar'];
        }

        $charPorAno = [];
        $chartPorAno['R'] = implode(",", $chart3['R']);
        $chartPorAno['B'] = implode(",", $chart3['B']);
        $chartPorAno['MB'] = implode(",", $chart3['MB']);
        $chartPorAno['Sin Calificar'] = implode(",", $chart3['Sin Calificar']);


        //
        //Armando Gráfico de Proyectos
        //

        //date('Y', strtotime($this->comienzo))
        //Construcción de $proyectosPorAno más arriba
        
        foreach ($proyectos as $proyecto) {
            if (isset($proyecto->comienzo)) {
                $elComienzo= date('Y', strtotime($proyecto->comienzo));
                if(isset($proyecto->termino) && date('Y', strtotime($proyecto->termino))>=$elComienzo){
                $elTermino= date('Y', strtotime($proyecto->termino));
                }
                else{
                    $elTermino=$anoActual;
                }

                if ($elComienzo >= $anoActual - 12 && $elComienzo <= $anoActual) {
                    $proyectosAdjudicadosPorAno[$elComienzo]+=1;

                    for ($i = $elComienzo; $i <= min($elTermino,$anoActual); $i++){
                        $proyectosActivosPorAno[$i]+=1;
                    }
                }
                elseif($elTermino>=$anoActual-12){
                    for ($i = $anoActual-12; $i <= min($elTermino,$anoActual); $i++){
                        $proyectosActivosPorAno[$i]+=1;
                    }
                }
            }
        }
        
        $charProyectosPorAno = implode(",", $proyectosAdjudicadosPorAno);

        $charProyectosActivosPorAno = implode(",", $proyectosActivosPorAno);



        //
        //Amasando todo en data
        //

        $data = compact('anoActual', 'anosPublicados', 'chartPorAno', 'articulosPendientes', 'estadisticas','charProyectosPorAno', 'charProyectosActivosPorAno');
        return view('reports.index', ['data' => $data]);
    }



    public function losArticulos()
    {

        $baseArray = array(
            'B' => 0,
            'MB' => 0,
            'R' => 0,
            'Sin Calificar' => 0
        );

        $anoActual = date("Y");
        $publicados = [];
        $articulosPorAno = [];
        for ($i = 12; $i >= 0; $i--) {
            $index = $anoActual - $i;
            $articulosPorAno[$index] = $baseArray;
            $publicados[] = $index;
        }
        $anosPublicados = "'" . implode("','", $publicados) . "'";


        $clasificacionActual = $baseArray;
        $chart = $baseArray;
        $chart2 = $baseArray;


        // Sé que este código es estúpido pero me encuentro en contra del reloj y como me está fallando hacer la división prefiero hacer las dos querys por separado
        $articulos = Articulos::where('is_valid', '=', 1)->where('estado_publicacion', '=', 'publicado')->get();


        $pendientes = Articulos::where('is_valid', '=', 1)->where('estado_publicacion', '!=', 'publicado')->get();
        /*
        $articulos = $losArticulos->where('estado_publicacion','=','publicado')->get();
        */

        //Armando gráficos
        foreach ($articulos as $articulo) {
            if ($anoActual - 6 <= $articulo->fecha_publicacion && $articulo->fecha_publicacion <= $anoActual - 1) {
                if (isset($articulo->revista)) {
                    if ($articulo->clasificacion() == 'B') {
                        $chart['B'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['B'] += 1;
                    } elseif ($articulo->clasificacion() == 'R') {
                        $chart['R'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['R'] += 1;
                    } elseif ($articulo->clasificacion() == 'MB') {
                        //else {
                        $chart['MB'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['MB'] += 1;
                    } else {
                        $chart['Sin Calificar'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] += 1;
                    }
                } else {
                    $chart['Sin Calificar'] += 1;
                    $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] += 1;
                }
            } elseif ($anoActual - 12 <= $articulo->fecha_publicacion && $articulo->fecha_publicacion <= $anoActual - 7) {
                if (isset($articulo->revista)) {
                    if ($articulo->clasificacion() == 'B') {
                        $chart2['B'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['B'] += 1;
                    } elseif ($articulo->clasificacion() == 'R') {
                        $chart2['R'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['R'] += 1;
                    } elseif ($articulo->clasificacion() == 'MB') {
                        //else {
                        $chart2['MB'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['MB'] += 1;
                    } else {
                        $chart2['Sin Calificar'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] += 1;
                    }
                } else {
                    $chart2['Sin Calificar'] += 1;
                    $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] += 1;
                }
            } elseif ($articulo->fecha_publicacion == $anoActual) {
                if (isset($articulo->revista)) {
                    if ($articulo->clasificacion() == 'B') {
                        $clasificacionActual['B'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['B'] += 1;
                    } elseif ($articulo->clasificacion() == 'R') {
                        $clasificacionActual['R'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['R'] += 1;
                    } elseif ($articulo->clasificacion() == 'MB') {
                        //else {
                        $clasificacionActual['MB'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['MB'] += 1;
                    } else {
                        $clasificacionActual['Sin Calificar'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] += 1;
                    }
                } else {
                    $clasificacionActual['Sin Calificar'] += 1;
                    $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] += 1;
                }
            }
        }

        $chart3 = array(
            'B' => [],
            'R' => [],
            'MB' => [],
            'Sin Calificar' => []
        );

        foreach ($articulosPorAno as $index => $elAno) {
            $chart3['B'][$index] = $elAno['B'];
            $chart3['MB'][$index] = $elAno['MB'];
            $chart3['R'][$index] = $elAno['R'];
            $chart3['Sin Calificar'][$index] = $elAno['Sin Calificar'];
        }

        $charPorAno = [];
        $chartPorAno['R'] = implode(",", $chart3['R']);
        $chartPorAno['B'] = implode(",", $chart3['B']);
        $chartPorAno['MB'] = implode(",", $chart3['MB']);
        $chartPorAno['Sin Calificar'] = implode(",", $chart3['Sin Calificar']);

        $articulosPendientes = count($pendientes);

        $data = compact('chart', 'chart2', 'clasificacionActual', 'anoActual', 'anosPublicados', 'chartPorAno', 'articulosPendientes');
        return view('reports.articulos', ['data' => $data]);
    }
}
