<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulos;

class chartController extends Controller
{
    //
    public function show()
    {

        $baseArray= array(
            'B' => 0,
            'MB' => 0,
            'R' => 0,
            'Sin Calificar' => 0
        );

        $anoActual = date("Y");
        $publicados = [];
        $articulosPorAno=[];
        for ($i = 12; $i >= 0; $i--) {
            $index=$anoActual-$i;
            $articulosPorAno[$index]=$baseArray;
            $publicados[] = $index;
        }
        $anosPublicados="'" . implode("','",$publicados)."'";


        $clasificacionActual = $baseArray;
        $chart = $baseArray;
        $chart2 = $baseArray;

        //Artículos Publicados
        $articulos = Articulos::where('is_valid', '=', 1)
            ->where('estado_publicacion','=','publicado')
            ->get();

        //Armando gráficos
        foreach ($articulos as $articulo) {
            if ($anoActual - 6 <= $articulo->fecha_publicacion && $articulo->fecha_publicacion <= $anoActual - 1) {
                if (isset($articulo->revista)) {
                    if ($articulo->clasificacion() == 'B') {
                        $chart['B'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['B'] +=1;
                    } elseif ($articulo->clasificacion() == 'R') {
                        $chart['R'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['R'] +=1;
                    }
                    elseif($articulo->clasificacion()=='MB') {
                    //else {
                        $chart['MB'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['MB'] +=1;
                    } else {
                        $chart['Sin Calificar'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] +=1;
                    }
                } else {
                    $chart['Sin Calificar'] += 1;
                    $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] +=1;
                }
            } elseif ($anoActual - 12 <= $articulo->fecha_publicacion && $articulo->fecha_publicacion <= $anoActual - 7) {
                if (isset($articulo->revista)) {
                    if ($articulo->clasificacion() == 'B') {
                        $chart2['B'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['B'] +=1;
                    } elseif ($articulo->clasificacion() == 'R') {
                        $chart2['R'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['R'] +=1;
                    }
                    elseif($articulo->clasificacion()=='MB') {
                    //else {
                        $chart2['MB'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['MB'] +=1;
                    }
                    else {
                        $chart2['Sin Calificar'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] +=1;
                    }
                } else {
                    $chart2['Sin Calificar'] += 1;
                    $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] +=1;
                }
            } elseif($articulo->fecha_publicacion==$anoActual){
                if (isset($articulo->revista)) {
                    if ($articulo->clasificacion() == 'B') {
                        $clasificacionActual['B'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['B'] +=1;
                    } elseif ($articulo->clasificacion() == 'R') {
                        $clasificacionActual['R'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['R'] +=1;
                    }
                    elseif($articulo->clasificacion()=='MB') {
                    //else {
                        $clasificacionActual['MB'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['MB'] +=1;
                    }
                    else {
                        $clasificacionActual['Sin Calificar'] += 1;
                        $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] +=1;
                    }
                } else {
                    $clasificacionActual['Sin Calificar'] += 1;
                    $articulosPorAno[$articulo->fecha_publicacion]['Sin Calificar'] +=1;
                }

            }
        }

        $chart3=array(
            'B' =>[],
            'R' =>[],
            'MB' => [],
            'Sin Calificar' =>[]
        );

        foreach($articulosPorAno as $index => $elAno){
            $chart3['B'][$index]=$elAno['B'];
            $chart3['MB'][$index]=$elAno['MB'];
            $chart3['R'][$index]=$elAno['R'];
            $chart3['Sin Calificar'][$index]=$elAno['Sin Calificar'];
        }

        $charPorAno=[];
        $chartPorAno['R']=implode(",",$chart3['R']);
        $chartPorAno['B']=implode(",",$chart3['B']);
        $chartPorAno['MB']=implode(",",$chart3['MB']);
        $chartPorAno['Sin Calificar']=implode(",",$chart3['Sin Calificar']);

        $data = compact('chart','chart2','clasificacionActual','anoActual','anosPublicados','chartPorAno');
        return view('reports.index', ['data' => $data]);
    }

}
