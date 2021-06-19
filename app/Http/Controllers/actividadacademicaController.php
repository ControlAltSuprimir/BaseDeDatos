<?php

namespace App\Http\Controllers;

use App\Models\ActividadAcademica;
use App\Models\Personas;
use App\Models\PersonasActividadesAcademicas;
use App\Models\ProyectosActividadesAcademicas;
use Illuminate\Http\Request;

class actividadacademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actividades = ActividadAcademica::where('is_valid','=',1)->get();
        $data=compact('actividades');
        return view('actividad_academica.index',['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('actividad_academica.create');
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
        $academica = new ActividadAcademica;
        $academica->tipo = $request->tipo;
        $academica->nombre = $request->nombre;
        $academica->participacion = $request->participacion;
        $academica->fecha_comienzo = $request->fecha_comienzo;
        $academica->fecha_termino = $request->fecha_termino;
        $academica->comentarios = $request->comentarios;
        $academica->is_valid = 1;

        $academica->save();

        foreach($request->personas as $persona)
        {
            if(isset($persona["'id'"]))
            {
            $participante = new PersonasActividadesAcademicas;
            $participante->id_persona = $persona["'id'"];
            $participante->id_viaje = $persona["'viaje'"];
            $participante->id_academica = $academica->id;
            $participante->descripcion = $persona["'cargo'"];
            $participante->is_valid = 1;

            $participante->save();}
            //return $participante;
        }

        foreach($request->proyectos as $proyecto)
        {
            if(isset($proyecto["'id'"]))
            {
            $academicaProyecto = new ProyectosActividadesAcademicas;
            $academicaProyecto->id_proyecto = $proyecto["'id'"];
            $academicaProyecto->id_academica = $academica->id;
            $academicaProyecto->is_valid = 1;
            $academicaProyecto->save();
            }
        }

        return redirect('/actividadacademica/'.$academica->id);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActividadAcademica  $actividadAcademica
     * @return \Illuminate\Http\Response
     */
    public function show(ActividadAcademica $actividadAcademica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActividadAcademica  $actividadAcademica
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $actividad = ActividadAcademica::where('is_valid','=',1)->find($id);

        $data= compact('actividad');

        return view('actividad_academica.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActividadAcademica  $actividadAcademica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //return $request;

        $academica =ActividadAcademica::find($id);
        $academica->tipo = $request->tipo;
        $academica->nombre = $request->nombre;
        $academica->participacion = $request->participacion;
        $academica->fecha_comienzo = $request->fecha_comienzo;
        $academica->fecha_termino = $request->fecha_termino;
        $academica->comentarios = $request->comentarios;
        $academica->is_valid = 1;

        $academica->save();

        PersonasActividadesAcademicas::where('id_academica', '=', $academica->id)
            ->where('is_valid', '=', 1)
            ->update(['is_valid' => 0]);

        foreach($request->personas as $persona)
        {
            if(isset($persona["'id'"]))
            {
            $participante = new PersonasActividadesAcademicas;
            $participante->id_persona = $persona["'id'"];
            $participante->id_viaje = $persona["'viaje'"];
            $participante->id_academica = $academica->id;
            $participante->descripcion = $persona["'cargo'"];
            $participante->is_valid = 1;

            $participante->save();}
            //return $participante;
        }

        ProyectosActividadesAcademicas::where('id_academica', '=', $academica->id)
            ->where('is_valid', '=', 1)
            ->update(['is_valid' => 0]);

        foreach($request->proyectos as $proyecto)
        {
            if(isset($proyecto["'id'"]))
            {
            $academicaProyecto = new ProyectosActividadesAcademicas;
            $academicaProyecto->id_proyecto = $proyecto["'id'"];
            $academicaProyecto->id_academica = $academica->id;
            $academicaProyecto->is_valid = 1;
            $academicaProyecto->save();
            }
        }

        return redirect('/actividadacademica/'.$academica->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActividadAcademica  $actividadAcademica
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActividadAcademica $actividadAcademica)
    {
        //
    }
}
