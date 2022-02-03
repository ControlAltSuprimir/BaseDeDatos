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
use App\Models\Tesis;
use App\Models\PersonaProyecto;

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

        /*
        $proyectos = Proyectos::where('is_valid', '=', 1)
            ->get();
            */

        //$data = compact('proyectos');
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
        $proyecto->created_by = auth()->id();
        $proyecto->updated_by = auth()->id();
        $proyecto->is_valid = 1;


        $proyecto->save();

        //participantes

        if (isset($request->participantes)) {
            foreach ($request->participantes as $item) {
                if ($item != $request->investigador_responsable) {

                    $participante = new PersonaProyecto;
                    $participante->id_persona = $item;
                    $participante->id_proyecto = $proyecto->id;
                    $participante->created_by = auth()->id();
                    $participante->updated_by = auth()->id();
                    $participante->is_valid = 1;
                    $participante->save();
                }
            }
        }


        //guardando articulos relacionados
        if (isset($request->articulos)) {
            foreach ($request->articulos as $item) {
                $articuloRelacionado = new ProyectosArticulos;
                $articuloRelacionado->id_articulo = $item;
                $articuloRelacionado->id_proyecto = $proyecto->id;
                $articuloRelacionado->created_by = auth()->id();
                $articuloRelacionado->updated_by = auth()->id();
                $articuloRelacionado->is_valid = 1;
                $articuloRelacionado->save();
            }
        }


        //guardando proyectos relacionados
        if (isset($request->tesis)) {
            foreach ($request->tesis as $item) {
                $tesisRelacionadas = new ProyectosTesistas;
                $tesisRelacionadas->id_tesis = $item;
                $tesisRelacionadas->id_proyecto = $proyecto->id;
                $tesisRelacionadas->created_by = auth()->id();
                $tesisRelacionadas->updated_by = auth()->id();
                $tesisRelacionadas->is_valid = 1;
                $tesisRelacionadas->save();
            }
        }


        //guardando proyectos relacionados
        if (isset($request->academica)) {
            foreach ($request->academica as $item) {
                $extensionRelacionada = new ProyectosActividadesAcademicas;
                $extensionRelacionada->id_academica = $item;
                $extensionRelacionada->id_proyecto = $proyecto->id;
                $extensionRelacionada->created_by = auth()->id();
                $extensionRelacionada->updated_by = auth()->id();
                $extensionRelacionada->is_valid = 1;
                $extensionRelacionada->save();
            }
        }



        //guardando proyectos relacionados
        if (isset($request->extension)) {
            foreach ($request->extension as $item) {
                $extensionRelacionada = new ProyectosActividadesExtension;
                $extensionRelacionada->id_actividad = $item;
                $extensionRelacionada->id_proyecto = $proyecto->id;
                $extensionRelacionada->created_by = auth()->id();
                $extensionRelacionada->updated_by = auth()->id();
                $extensionRelacionada->is_valid = 1;
                $extensionRelacionada->save();
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
        $proyecto = Proyectos::find($id);
        //$listaParticipantes = $proyecto->participantes()->get();
        $articulos = $proyecto->articulos()->get();
        $tesis = $proyecto->tesistas()->get();
        $listaExtensiones = $proyecto->extensiones()->get();

        //$articulos = $listaArticulos;

        $data = compact('proyecto', 'articulos', 'tesis');
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
        $proyecto->updated_by = auth()->id();

        $proyecto->save();

        require(__DIR__ . '/../../Helpers/Collection/collectiontostring.php');



        //participantes
        
        $losParticipantes = $proyecto->losParticipantes()->select('personas.id')->get()->makeHidden('pivot');
        $losParticipantes = collectionToArrayId($losParticipantes);
        
        //nuevos participantes
        if (isset($request->participantes)) {
            // Borrado    
            $borrar = [];
            $borrar = array_diff($losParticipantes, $request->participantes);
            PersonaProyecto::where('id_proyecto','=',$proyecto->id)->whereIn('id_persona', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->participantes, $losParticipantes);

            foreach ($agregando as $item) {
                if ($item != $request->investigador_responsable) {
                    $participante = new PersonaProyecto;
                    $participante->id_persona = $item;
                    $participante->id_proyecto = $proyecto->id;
                    $proyecto->updated_by = auth()->id();
                    $proyecto->created_by = auth()->id();
                    $participante->is_valid = 1;
                    $participante->save();

                }
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado al proyecto
            PersonaProyecto::where('id_proyecto','=',$proyecto->id)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }
        //articulos relacionados

        $losArticulos = $proyecto->articulos()->select('articulos.id')->get()->makeHidden('pivot');
        $losArticulos = collectionToArrayId($losArticulos);
        //return $losArticulos;
        if (isset($request->articulos)) {
            $borrar = [];
            $borrar = array_diff($losArticulos, $request->articulos);
            ProyectosArticulos::where('id_proyecto','=',$proyecto->id)->whereIn('id_articulo', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->articulos, $losArticulos);
            foreach ($agregando as $item) {
                    $articuloRelacionado = new ProyectosArticulos;
                    $articuloRelacionado->id_articulo = $item;
                    $articuloRelacionado->id_proyecto = $proyecto->id;
                    $articuloRelacionado->updated_by = auth()->id();
                    $articuloRelacionado->created_by = auth()->id();
                    $articuloRelacionado->is_valid = 1;
                    $articuloRelacionado->save();   
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado al proyecto
            ProyectosArticulos::where('id_proyecto','=',$proyecto->id)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }



        //guardando tesis relacionados
        $lasTesis = $proyecto->tesistas()->select('tesis.id')->get()->makeHidden('pivot');
        $lasTesis = collectionToArrayId($lasTesis);

        if (isset($request->tesis)) {
            $borrar = [];
            $borrar = array_diff($lasTesis, $request->tesis);
            ProyectosTesistas::where('id_proyecto','=',$proyecto->id)->whereIn('id_tesis', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->tesis, $lasTesis);
            foreach ($agregando as $item) {
                    $tesisRelacionadas = new ProyectosTesistas;
                    $tesisRelacionadas->id_tesis = $item;
                    $tesisRelacionadas->id_proyecto = $proyecto->id;
                    $tesisRelacionadas->updated_by = auth()->id();
                    $tesisRelacionadas->created_by = auth()->id();
                    $tesisRelacionadas->is_valid = 1;
                    $tesisRelacionadas->save();
                    
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado al proyecto
            ProyectosTesistas::where('id_proyecto','=',$proyecto->id)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }


        //guardando extensiones
        $lasExtensiones = $proyecto->extensiones()->select('actividadextension.id')->get()->makeHidden('pivot');
        $lasExtensiones = collectionToArrayId($lasExtensiones);
        

        if (isset($request->extension)) {
            $borrar = [];
            $borrar = array_diff($lasExtensiones, $request->extension);
            ProyectosActividadesExtension::where('id_proyecto','=',$proyecto->id)->whereIn('id_actividad', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->extension, $lasExtensiones);

            foreach ($agregando as $item) {
                    $extensionRelacionada = new ProyectosActividadesExtension;
                    $extensionRelacionada->id_actividad = $item;
                    $extensionRelacionada->id_proyecto = $proyecto->id;
                    $extensionRelacionada->updated_by = auth()->id();
                    $extensionRelacionada->created_by = auth()->id();
                    $extensionRelacionada->is_valid = 1;
                    $extensionRelacionada->save();

            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado al proyecto
            ProyectosActividadesExtension::where('id_proyecto','=',$proyecto->id)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }


        //guardando academicas
        $lasAcademicas = $proyecto->academicas()->select('actividadacademica.id')->get()->makeHidden('pivot');
        $lasAcademicas = collectionToArrayId($lasAcademicas);
        //return $request->academica;

        if (isset($request->academica)) {
            $borrar = [];
            $borrar = array_diff($lasAcademicas, $request->academica);
            
            ProyectosActividadesAcademicas::where('id_proyecto','=',$proyecto->id)->whereIn('id_academica', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->academica, $lasAcademicas);

            foreach ($agregando as $item) {
                    $extensionRelacionada = new ProyectosActividadesAcademicas;
                    $extensionRelacionada->id_academica = $item;
                    $extensionRelacionada->id_proyecto = $proyecto->id;
                    $extensionRelacionada->updated_by = auth()->id();
                    $extensionRelacionada->created_by = auth()->id();
                    $extensionRelacionada->is_valid = 1;
                    $extensionRelacionada->save();

            }
        }  else {
            //Si el request está vacío entonces borramos todo lo asociado al proyecto
            ProyectosActividadesAcademicas::where('id_proyecto','=',$proyecto->id)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
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
