<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\Personas;
use App\Models\Persona_Articulo;
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
        $articulos = Articulos::where('is_valid', '=', 1)
            ->orderBy('titulo', 'asc')
            ->paginate(25);
        $data = compact('articulos');
        return view('articulos.index', ['data' => $data]);
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
        $articulo->issue = $request->issue;
        $articulo->volumen = $request->volumen;
        $articulo->arxiv = $request->arxiv;
        $articulo->id_Revista = $request->revista;
        $articulo->descripcion = $request->descripcion;
        $articulo->is_valid=1;

        $articulo->save();

        $repeticiones=[];
        if(isset($request->personas))
        {
            foreach($request->personas as $persona)
            {
                if(isset($persona) && !in_array($persona,$repeticiones))
                {
                    $autor = new Persona_Articulo;
                    $autor->id_Persona=$persona;
                    $autor->id_Articulo=$articulo->id;
                    $autor->is_valid=1;
                    $autor->save();

                    $repeticiones[]=$persona;
                }
            }
        }


        if(isset($request->extraPersonas))
        {
            foreach($request->extraPersonas as $extraPersona)
            {
                if(isset($extraPersona))
                {
                    $extra = new Personas;
                    $extra->primer_nombre=$extraPersona[0];
                    $extra->primer_apellido=$extraPersona[1];
                    $extra->is_valid=1;
                    $extra->save();

                    $autor = new Persona_Articulo;
                    $autor->id_Persona=$extra->id;
                    $autor->id_Articulo=$articulo->id;
                    $autor->is_valid=1;
                    $autor->save();

                }
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

        $proyectos = $articulo->proyectosArray();

        $tesis = $articulo->tesistasArray();

        $data=compact('articulo','revista','proyectos','autores','tesis');
        //return $articulo;
        return view('articulos.show',['data'=>$data]);
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
        $articulo->issue = $request->issue;
        $articulo->volumen = $request->volumen;
        $articulo->arxiv = $request->arxiv;
        $articulo->id_Revista = $request->revista;
        $articulo->descripcion = $request->descripcion;
        $articulo->is_valid=1;

        $articulo->save();

        Persona_Articulo::where('id_Articulo', '=', $articulo->id)
                                            ->where('is_valid','=',1)
                                            ->update(['is_valid'=> 0]);
        $repeticiones=[];
        if(isset($request->personas))
        {
            foreach($request->personas as $persona)
            {
                if(isset($persona) && !in_array($persona,$repeticiones))
                {
                    $autor = new Persona_Articulo;
                    $autor->id_Persona=$persona;
                    $autor->id_Articulo=$articulo->id;
                    $autor->is_valid=1;
                    $autor->save();
                    $repeticiones[]=$persona;

                }
            }
        }

        if(isset($request->extraPersonas))
        {
            foreach($request->extraPersonas as $extraPersona)
            {
                if(isset($extraPersona))
                {
                    $extra = new Personas;
                    $extra->primer_nombre=$extraPersona[0];
                    $extra->primer_apellido=$extraPersona[1];
                    $extra->is_valid=1;
                    $extra->save();

                    $autor = new Persona_Articulo;
                    $autor->id_Persona=$extra->id;
                    $autor->id_Articulo=$articulo->id;
                    $autor->is_valid=1;
                    $autor->save();

                }
            }
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
