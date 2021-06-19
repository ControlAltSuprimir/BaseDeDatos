<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use App\Models\Personas;
use App\Models\ProyectosActividadesAcademicas;
use App\Models\ProyectosPersonasCoinvestigadores;
use App\Models\ProyectosPersonasColaboradores;
use App\Models\ProyectosArticulos;
use App\Models\ProyectosActividadesExtension;
use App\Models\ProyectosTesistas;

use Illuminate\Http\Request;

class proyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $proyectos = Proyectos::where('is_valid','=',1)
                                ->get();

        $data=compact('proyectos');
        //return $data;
        return view('proyectos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $option = 'proyecto';
        $data = compact('option');
        return view('proyectos.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request;

        $proyecto = new Proyectos;
        $proyecto->titulo = $request->titulo;
        $proyecto->monto_adjudicado = $request->monto_adjudicado;
        $proyecto->codigo_proyecto = $request->codigo_proyecto;
        $proyecto->comienzo = $request->comienzo;
        $proyecto->termino = $request->termino;
        $proyecto->area = $request->area;
        $proyecto->tipo_proyecto = $request->tipo_proyecto;
        $proyecto->organizacion_financia = $request->organizacion_financia;
        $proyecto->descripcion = $request->observaciones;
        $proyecto->investigador_responsable = $request->investigador_responsable;
        $proyecto->is_valid = 1;
        //$proyecto->is_valid = 1;

        $participantes[] = $request->investigador_responsable;

        $proyecto->save();


        //guardando coinvestigadores registrados


        if (isset($request->coinvestigadores)) {
            foreach ($request->coinvestigadores as $item) {
                if (isset($item) && !in_array($item, $participantes)) {
                    $coinvestigador = new ProyectosPersonasCoinvestigadores;
                    $coinvestigador->id_persona = $item;
                    $coinvestigador->id_proyecto = $proyecto->id;
                    $coinvestigador->is_valid = 1;
                    $coinvestigador->save();
                    $participantes[] = $item;
                }
            }
        }


        //guardando coinvestigadores no registrados
        if (isset($request->extraCoinvestigadores)) {
            foreach ($request->extraCoinvestigadores as $array) {
                $persona = new Personas;
                $persona->primer_nombre = $array["'primer_nombre'"];
                $persona->primer_apellido = $array["'primer_apellido'"];
                $persona->is_valid = 1;
                $persona->save();

                $extraCoinvestigador = new ProyectosPersonasCoinvestigadores;
                $extraCoinvestigador->id_persona = $persona->id;
                $extraCoinvestigador->id_proyecto = $proyecto->id;
                $extraCoinvestigador->is_valid = 1;
                $extraCoinvestigador->save();
                //$participantes[] = $item;
            }
        }

        //guardando colaboradores registrados
        if (isset($request->colaboradores)) {
            foreach ($request->colaboradores as $item) {
                if (isset($item) && !in_array($item, $participantes)) {
                    $colaborador = new ProyectosPersonasColaboradores;
                    $colaborador->id_persona = $item;
                    $colaborador->id_proyecto = $proyecto->id;
                    $colaborador->is_valid = 1;
                    $colaborador->save();
                    $participantes[] = $item;
                }
            }
        }

        //guardando colaboradores no registrados
        if (isset($request->extraColaboradores)) {
            foreach ($request->extraColaboradores as $array) {
                $persona = new Personas;
                $persona->primer_nombre = $array["'primer_nombre'"];
                $persona->primer_apellido = $array["'primer_apellido'"];
                $persona->is_valid = 1;
                $persona->save();

                $extraColaboradores = new ProyectosPersonasColaboradores;
                $extraColaboradores->id_persona = $persona->id;
                $extraColaboradores->id_proyecto = $proyecto->id;
                $extraColaboradores->is_valid = 1;
                $extraColaboradores->save();
                //$participantes[] = $item;
            }
        }

        $articulosRepetidos = [];
        //guardando articulos relacionados
        if (isset($request->articulos)) {
            foreach ($request->articulos as $item) {
                if (isset($item) && !in_array($item, $articulosRepetidos)) {
                    $articuloRelacionado = new ProyectosArticulos;
                    $articuloRelacionado->id_articulo = $item;
                    $articuloRelacionado->id_proyecto = $proyecto->id;
                    $articuloRelacionado->is_valid = 1;
                    $articuloRelacionado->save();
                    $articulosRepetidos[] = $item;
                }
            }
        }


        $tesisRepetidas = [];
        //guardando proyectos relacionados
        if (isset($request->tesis)) {
            foreach ($request->tesis as $item) {
                if (isset($item) && !in_array($item, $tesisRepetidas)) {
                    $tesisRelacionadas = new ProyectosTesistas;
                    $tesisRelacionadas->id_tesis = $item;
                    $tesisRelacionadas->id_proyecto = $proyecto->id;
                    $tesisRelacionadas->is_valid = 1;
                    $tesisRelacionadas->save();
                    $tesisRepetidas[] = $item;
                }
            }
        }

        $academicaRepetidas = [];
        //guardando proyectos relacionados

        if (isset($request->academica)) {
            foreach ($request->academica as $item) {
                if (isset($item["'id'"]) && !in_array($item["'id'"], $academicaRepetidas)) {
                    $extensionRelacionada = new ProyectosActividadesAcademicas;
                    $extensionRelacionada->id_academica = $item["'id'"];
                    $extensionRelacionada->cargo = $item["'cargo'"];
                    $extensionRelacionada->id_proyecto = $proyecto->id;
                    $extensionRelacionada->is_valid = 1;
                    $extensionRelacionada->save();
                    $academicaRepetida[] = $item["'id'"];
                }
            }
        }


        $extensionRepetidas = [];
        //guardando proyectos relacionados

        if (isset($request->extension)) {
            foreach ($request->extension as $item) {
                if (isset($item["'id'"]) && !in_array($item["'id'"], $extensionRepetidas)) {
                    $extensionRelacionada = new ProyectosActividadesExtension;
                    $extensionRelacionada->id_actividad = $item["'id'"];
                    $extensionRelacionada->cargo = $item["'cargo'"];
                    $extensionRelacionada->id_proyecto = $proyecto->id;
                    $extensionRelacionada->is_valid = 1;
                    $extensionRelacionada->save();
                    $extensionRepetida[] = $item["'id'"];
                }
            }
        }


        return redirect('/proyectos/' . $proyecto->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $proyecto=Proyectos::find($id);
        $listaCoinvestigadores=$proyecto->coinvestigadores()->get();
        $listaColaboradores=$proyecto->colaboradores()->get();
        $listaArticulos = $proyecto->articulos()->get();
        $listaTesis = $proyecto->tesistas()->get();
        $listaExtensiones = $proyecto->extensiones()->get();

        //
        $articulos=[];
        foreach($listaArticulos as $articulo)
        {
            $articulos[]=$articulo->descripcion();
        }

        
        $tesis=[];
        foreach($listaTesis as $tesista)
        {
            $tesis[]=$tesista->descripcion();
        }
        

        $data = compact('proyecto','listaCoinvestigadores','listaColaboradores','articulos','tesis','listaExtensiones');
        //$data = compact('proyecto','listaCoinvestigadores','listaColaboradores','articulos','listaExtensiones');

        //return $data;
        return view('proyectos.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = compact('id');
        return view('proyectos.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //return $request;

        $proyecto = Proyectos::find($id);
        $proyecto->titulo = $request->titulo;
        $proyecto->monto_adjudicado = $request->monto_adjudicado;
        $proyecto->codigo_proyecto = $request->codigo_proyecto;
        $proyecto->comienzo = $request->comienzo;
        $proyecto->termino = $request->termino;
        $proyecto->area = $request->area;
        $proyecto->tipo_proyecto = $request->tipo_proyecto;
        $proyecto->organizacion_financia = $request->organizacion_financia;
        $proyecto->descripcion = $request->observaciones;
        $proyecto->investigador_responsable = $request->investigador_responsable;
        $proyecto->is_valid = 1;
        //$proyecto->is_valid = 1;

        $participantes[] = $request->investigador_responsable;

        $proyecto->save();


        //guardando coinvestigadores registrados

        ProyectosPersonasCoinvestigadores::where('id_proyecto', '=', $proyecto->id)
            ->where('is_valid', '=', 1)
            ->update(['is_valid' => 0]);


        if (isset($request->coinvestigadores)) {
            foreach ($request->coinvestigadores as $item) {
                if (isset($item) && !in_array($item, $participantes)) {
                    $coinvestigador = new ProyectosPersonasCoinvestigadores;
                    $coinvestigador->id_persona = $item;
                    $coinvestigador->id_proyecto = $proyecto->id;
                    $coinvestigador->is_valid = 1;
                    $coinvestigador->save();
                    $participantes[] = $item;
                }
            }
        }


        //guardando coinvestigadores no registrados

        if (isset($request->extraCoinvestigadores)) {
            foreach ($request->extraCoinvestigadores as $array) {
                $persona = new Personas;
                $persona->primer_nombre = $array["'primer_nombre'"];
                $persona->primer_apellido = $array["'primer_apellido'"];
                $persona->is_valid = 1;
                $persona->save();

                $extraCoinvestigador = new ProyectosPersonasCoinvestigadores;
                $extraCoinvestigador->id_persona = $persona->id;
                $extraCoinvestigador->id_proyecto = $proyecto->id;
                $extraCoinvestigador->is_valid = 1;
                $extraCoinvestigador->save();
                //$participantes[] = $item;
            }
        }

        //guardando colaboradores registrados

        ProyectosPersonasColaboradores::where('id_proyecto', '=', $proyecto->id)
            ->where('is_valid', '=', 1)
            ->update(['is_valid' => 0]);

        if (isset($request->colaboradores)) {
            foreach ($request->colaboradores as $item) {
                if (isset($item) && !in_array($item, $participantes)) {
                    $colaborador = new ProyectosPersonasColaboradores;
                    $colaborador->id_persona = $item;
                    $colaborador->id_proyecto = $proyecto->id;
                    $colaborador->is_valid = 1;
                    $colaborador->save();
                    $participantes[] = $item;
                }
            }
        }

        //guardando colaboradores no registrados
        if (isset($request->extraColaboradores)) {
            foreach ($request->extraColaboradores as $array) {
                $persona = new Personas;
                $persona->primer_nombre = $array["'primer_nombre'"];
                $persona->primer_apellido = $array["'primer_apellido'"];
                $persona->is_valid = 1;
                $persona->save();

                $extraColaboradores = new ProyectosPersonasColaboradores;
                $extraColaboradores->id_persona = $persona->id;
                $extraColaboradores->id_proyecto = $proyecto->id;
                $extraColaboradores->is_valid = 1;
                $extraColaboradores->save();
                //$participantes[] = $item;
            }
        }

        $articulosRepetidos = [];
        //guardando articulos relacionados

        ProyectosArticulos::where('id_proyecto', '=', $proyecto->id)
                                            ->where('is_valid','=',1)
                                            ->update(['is_valid'=> 0]);

        if (isset($request->articulos)) {
            foreach ($request->articulos as $item) {
                if (isset($item) && !in_array($item, $articulosRepetidos)) {
                    $articuloRelacionado = new ProyectosArticulos;
                    $articuloRelacionado->id_articulo = $item;
                    $articuloRelacionado->id_proyecto = $proyecto->id;
                    $articuloRelacionado->is_valid = 1;
                    $articuloRelacionado->save();
                    $articulosRepetidos[] = $item;
                }
            }
        }


        $tesisRepetidas = [];
        //guardando tesis relacionados

        ProyectosTesistas::where('id_proyecto', '=', $proyecto->id)
        ->where('is_valid','=',1)
        ->update(['is_valid'=> 0]);

        if (isset($request->tesis)) {
            foreach ($request->tesis as $item) {
                if (isset($item) && !in_array($item, $tesisRepetidas)) {
                    $tesisRelacionadas = new ProyectosTesistas;
                    $tesisRelacionadas->id_tesis = $item;
                    $tesisRelacionadas->id_proyecto = $proyecto->id;
                    $tesisRelacionadas->is_valid = 1;
                    $tesisRelacionadas->save();
                    $tesisRepetidas[] = $item;
                }
            }
        }


        $extensionRepetidas = [];
        //guardando proyectos relacionados

        ProyectosActividadesExtension::where('id_proyecto', '=', $proyecto->id)
        ->where('is_valid','=',1)
        ->update(['is_valid'=> 0]);

        if (isset($request->extension)) {
            foreach ($request->extension as $item) {
                if (isset($item["'id'"]) && !in_array($item["'id'"], $extensionRepetidas)) {
                    $extensionRelacionada = new ProyectosActividadesExtension;
                    $extensionRelacionada->id_actividad = $item["'id'"];
                    $extensionRelacionada->cargo = $item["'cargo'"];
                    $extensionRelacionada->id_proyecto = $proyecto->id;
                    $extensionRelacionada->is_valid = 1;
                    $extensionRelacionada->save();
                    $extensionRepetida[] = $item;
                }
            }
        }


        return redirect('/proyectos/' . $proyecto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyectos $proyectos)
    {
        //
    }
}
