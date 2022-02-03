<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\ArticulosTesis;
use App\Models\Personas;
use App\Models\Persona_Articulo;
use App\Models\ProyectosArticulos;
use Illuminate\Http\Request;

class articulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('articulos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articulos.create');
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
        $articulo = new Articulos;

        $articulo->titulo = $request->titulo;
        $articulo->DOI = $request->DOI;
        $articulo->fecha_publicacion = $request->fecha_publicacion;
        $articulo->intervalo_paginas = $request->intervalo_paginas;
        $articulo->estado_publicacion = $request->estadoPublicacion;
        $articulo->issue = $request->issue;
        $articulo->volumen = $request->volumen;
        $articulo->arxiv = $request->arxiv;
        $articulo->id_Revista = $request->revista;
        $articulo->descripcion = $request->descripcion;
        $articulo->is_valid = 1;

        $articulo->save();

        if (isset($request->personas)) {
            foreach ($request->personas as $persona) {
                $autor = new Persona_Articulo;
                $autor->id_Persona = $persona;
                $autor->id_Articulo = $articulo->id;
                $autor->created_by = auth()->id();
                $autor->updated_by = auth()->id();
                $autor->is_valid = 1;
                $autor->save();
            }
        }



        if (isset($request->proyectos)) {
            foreach ($request->proyectos as $proyecto) {
                $elProyecto = new ProyectosArticulos;
                $elProyecto->id_proyecto = $proyecto;
                $elProyecto->id_articulo = $articulo->id;
                $elProyecto->created_by = auth()->id();
                $elProyecto->updated_by = auth()->id();
                $elProyecto->is_valid = 1;
                $elProyecto->save();
            }
        }


        if (isset($request->extraPersonas)) {
            foreach ($request->extraPersonas as $extraPersona) {
                if (isset($extraPersona)) {
                    $extra = new Personas;
                    $extra->primer_nombre = $extraPersona[0];
                    $extra->primer_apellido = $extraPersona[1];
                    $extra->created_by = auth()->id();
                    $extra->updated_by = auth()->id();
                    $extra->is_valid = 1;
                    $extra->save();

                    $autor = new Persona_Articulo;
                    $autor->id_Persona = $extra->id;
                    $autor->id_Articulo = $articulo->id;
                    $autor->created_by = auth()->id();
                    $autor->updated_by = auth()->id();
                    $autor->is_valid = 1;
                    $autor->save();
                }
            }
        }

        if (isset($request->tesis)) {
            foreach ($request->tesis as $tesis) {
                $elProyecto = new ArticulosTesis;
                $elProyecto->id_tesis = $tesis;
                $elProyecto->id_articulo = $articulo->id;
                $elProyecto->created_by = auth()->id();
                $elProyecto->updated_by = auth()->id();
                $elProyecto->is_valid = 1;
                $elProyecto->save();
            }
        }

        return redirect('/articulos/' . $articulo->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $articulo = Articulos::find($id);
        $revista = $articulo->revista;
        $autores = $articulo->autoresCompact();

        $proyectos = $articulo->proyectos()->get();

        $tesis = $articulo->tesistasArray();

        $data = compact('articulo', 'revista', 'proyectos', 'autores', 'tesis');
        //return $tesis;
        return view('articulos.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = compact('id');
        return view('articulos.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulos $articulo)
    {
        //
        //return $request;

        $articulo->titulo = $request->titulo;
        $articulo->DOI = $request->DOI;
        $articulo->fecha_publicacion = $request->fecha_publicacion;
        $articulo->intervalo_paginas = $request->intervalo_paginas;
        $articulo->estado_publicacion = $request->estadoPublicacion;
        $articulo->issue = $request->issue;
        $articulo->volumen = $request->volumen;
        $articulo->arxiv = $request->arxiv;
        $articulo->id_Revista = $request->revista;
        $articulo->descripcion = $request->descripcion;
        $articulo->is_valid = 1;

        $articulo->save();



        require(__DIR__ . '/../../Helpers/Collection/collectiontostring.php'); //transformamos collecciones en arrays para hacer diferencias con el request(array)

        //participantes
        $losParticipantes = $articulo->autores()->select('personas.id')->get()->makeHidden('pivot');
        $losParticipantes = array_unique(collectionToArrayId($losParticipantes));

        if (isset($request->personas)) {
            //borrar
            $borrar = array_diff($losParticipantes, $request->personas);
            Persona_Articulo::where('id_Articulo', '=', $articulo->id)->whereIn('id_Persona', $borrar)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
            //agregando
            $agregando = [];
            $agregando = array_diff($request->personas, $losParticipantes);
            foreach ($agregando as $item) {
                $nuevoParticipante = new Persona_Articulo;
                $nuevoParticipante->id_Persona = $item;
                $nuevoParticipante->id_Articulo = $articulo->id;
                $nuevoParticipante->created_by = auth()->id();
                $nuevoParticipante->updated_by = auth()->id();
                $nuevoParticipante->is_valid = 1;
                $nuevoParticipante->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado a la actividad
            Persona_Articulo::where('id_Articulo', '=', $articulo->id)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
        }


        //extrapersonas
        if (isset($request->extraPersonas)) {
            foreach ($request->extraPersonas as $extraPersona) {
                if (isset($extraPersona)) {
                    $extra = new Personas;
                    $extra->primer_nombre = $extraPersona[0];
                    $extra->primer_apellido = $extraPersona[1];
                    $extra->is_valid = 1;
                    $extra->save();

                    $autor = new Persona_Articulo;
                    $autor->id_Persona = $extra->id;
                    $autor->id_Articulo = $articulo->id;
                    $autor->is_valid = 1;
                    $autor->save();
                }
            }
        }


        //proyectos
        $losParticipantes = $articulo->proyectos()->select('proyectos.id')->get()->makeHidden('pivot');
        $losParticipantes = array_unique(collectionToArrayId($losParticipantes));

        if (isset($request->proyectos)) {
            //borrar
            $borrar = array_diff($losParticipantes, $request->proyectos);
            ProyectosArticulos::where('id_articulo', '=', $articulo->id)->whereIn('id_proyecto', $borrar)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
            //agregando
            $agregando = [];
            $agregando = array_diff($request->proyectos, $losParticipantes);
            foreach ($agregando as $item) {
                $academicaProyecto = new ProyectosArticulos;
                $academicaProyecto->id_proyecto = $item;
                $academicaProyecto->id_articulo = $articulo->id;
                $academicaProyecto->created_by = auth()->id();
                $academicaProyecto->updated_by = auth()->id();
                $academicaProyecto->is_valid = 1;
                $academicaProyecto->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado a la actividad
            ProyectosArticulos::where('id_articulo', '=', $articulo->id)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
        }



        //tesis
        $losParticipantes = $articulo->tesistas()->select('tesis.id')->get()->makeHidden('pivot');
        $losParticipantes = array_unique(collectionToArrayId($losParticipantes));

        if (isset($request->tesis)) {
            //borrar
            $borrar = array_diff($losParticipantes, $request->tesis);
            ArticulosTesis::where('id_articulo', '=', $articulo->id)->whereIn('id_tesis', $borrar)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
            //agregando
            $agregando = [];
            $agregando = array_diff($request->tesis, $losParticipantes);
            foreach ($agregando as $item) {
                $academicaProyecto = new ArticulosTesis;
                $academicaProyecto->id_tesis = $item;
                $academicaProyecto->id_articulo = $articulo->id;
                $academicaProyecto->created_by = auth()->id();
                $academicaProyecto->updated_by = auth()->id();
                $academicaProyecto->is_valid = 1;
                $academicaProyecto->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado a la actividad
            ArticulosTesis::where('id_articulo', '=', $articulo->id)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
        }

        return redirect('/articulos/' . $articulo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulos $articulos)
    {
        //
    }
}
