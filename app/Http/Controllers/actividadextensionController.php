<?php

namespace App\Http\Controllers;

use App\Models\ActividadExtension;
use App\Models\ProyectosActividadesExtension;
use App\Models\PersonasActividadesExtension;
use Illuminate\Http\Request;

class actividadextensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actividades = ActividadExtension::where('is_valid','=',1)->get();
        $data=compact('actividades');
        return view('actividad_extension.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('actividad_extension.create');
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

        $extension = new ActividadExtension;
        $extension->tipo = $request->tipo;
        $extension->nombre = $request->nombre;
        $extension->publicoObjetivo = $request->publicoObjetivo;
        $extension->numeroParticipantes = $request->numeroParticipantes;
        $extension->financiamiento = $request->financiamiento;
        $extension->comentarios = $request->comentarios;
        $extension->fecha_comienzo = $request->fecha_comienzo;
        $extension->fecha_termino = $request->fecha_termino;
        
        $extension->is_valid = 1;

        $extension->save();

        foreach($request->personas as $persona)
        {
            if(isset($persona["'id'"]))
            {
            $participante = new PersonasActividadesExtension;
            $participante->id_persona = $persona["'id'"];
            $participante->id_viaje = $persona["'viaje'"];
            $participante->id_actividad = $extension->id;
            $participante->cargo = $persona["'cargo'"];
            $participante->is_valid = 1;

            $participante->save();}
            //return $participante;
        }

        foreach($request->proyectos as $proyecto)
        {
            if(isset($proyecto["'id'"]))
            {
            $academicaProyecto = new ProyectosActividadesExtension;
            $academicaProyecto->id_proyecto = $proyecto["'id'"];
            $academicaProyecto->id_actividad = $extension->id;
            $academicaProyecto->is_valid = 1;
            $academicaProyecto->save();
            }
        }

        return redirect('/actividadextension/'.$extension->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActividadExtension  $actividadExtension
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $extension = ActividadExtension::find($id);

        //return $extension;
        $participantes = $extension->participantes()->get();
        $proyectos = $extension->proyectos()->get();

        

        $data = compact('extension','participantes','proyectos');

        return view('actividad_extension.show',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActividadExtension  $actividadExtension
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $actividad = ActividadExtension::where('is_valid','=',1)->find($id);

        $data= compact('actividad');

        return view('actividad_extension.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActividadExtension  $actividadExtension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        //return $request;

        $extension =ActividadExtension::find($id);
        $extension->tipo = $request->tipo;
        $extension->nombre = $request->nombre;
        $extension->publicoObjetivo = $request->publicoObjetivo;
        $extension->numeroParticipantes = $request->numeroParticipantes;
        $extension->financiamiento = $request->financiamiento;
        $extension->comentarios = $request->comentarios;
        $extension->fecha_comienzo = $request->fecha_comienzo;
        $extension->fecha_termino = $request->fecha_termino;
        
        $extension->is_valid = 1;

        $extension->save();

        PersonasActividadesExtension::where('id_actividad', '=', $extension->id)
            ->where('is_valid', '=', 1)
            ->update(['is_valid' => 0]);
            
        //return $request->personas;

        foreach($request->personas as $persona)
        {
            if(isset($persona["'id'"]))
            {
            $participante = new PersonasActividadesExtension;
            $participante->id_persona = $persona["'id'"];
            $participante->id_viaje = $persona["'viaje'"];
            $participante->id_actividad = $extension->id;
            $participante->cargo = $persona["'cargo'"];
            $participante->is_valid = 1;

            $participante->save();}
            //return $participante;
        }

        ProyectosActividadesExtension::where('id_actividad', '=', $extension->id)
            ->where('is_valid', '=', 1)
            ->update(['is_valid' => 0]);

        foreach($request->proyectos as $proyecto)
        {
            if(isset($proyecto["'id'"]))
            {
            $academicaProyecto = new ProyectosActividadesExtension;
            $academicaProyecto->id_proyecto = $proyecto["'id'"];
            $academicaProyecto->id_actividad = $extension->id;
            $academicaProyecto->is_valid = 1;
            $academicaProyecto->save();
            }
        }

        return redirect('/actividadextension/'.$extension->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActividadExtension  $actividadExtension
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActividadExtension $actividadExtension)
    {
        //
    }
}
