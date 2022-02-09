<?php

namespace App\Http\Controllers;

use App\Models\ActividadExtension;
use App\Models\ProyectosActividadesExtension;
use App\Models\PersonasActividadesExtension;
use App\Models\ActividadFinanciacion;
use App\Models\ActividadViaje;
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
        $actividades = ActividadExtension::where('is_valid', '=', 1)->get();
        $data = compact('actividades');
        return view('actividad_extension.index', ['data' => $data]);
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

        $extension->id_financiamiento = $request->institucionFinanciadora;
        $extension->montofinanciado = $request->montofinanciado;

        $extension->tipo = $request->tipo;
        $extension->nombre = $request->nombre;
        $extension->publicoObjetivo = $request->publicoObjetivo;
        $extension->numeroParticipantes = $request->numeroParticipantes;
        $extension->financiamiento = $request->financiamiento;
        $extension->comentarios = $request->comentarios;
        $extension->fecha_comienzo = $request->fecha_comienzo;
        $extension->fecha_termino = $request->fecha_termino;
        $extension->created_by = auth()->id();
        $extension->updated_by = auth()->id();
        $extension->is_valid = 1;

        $extension->save();

        if (isset($request->participantes)) {
            foreach ($request->participantes as $participante) {

                $nuevoParticipante = new PersonasActividadesExtension;
                $nuevoParticipante->id_persona = $participante;
                $nuevoParticipante->id_actividad = $extension->id;
                $nuevoParticipante->created_by = auth()->id();
                $nuevoParticipante->updated_by = auth()->id();
                $nuevoParticipante->is_valid = 1;

                $nuevoParticipante->save();
            }
        }

        if (isset($request->proyectos)) {
            foreach ($request->proyectos as $proyecto) {
                $academicaProyecto = new ActividadFinanciacion;
                $academicaProyecto->id_proyecto = $proyecto;
                $academicaProyecto->id_extension = $extension->id;
                $academicaProyecto->created_by = auth()->id();
                $academicaProyecto->updated_by = auth()->id();
                $academicaProyecto->is_valid = 1;
                $academicaProyecto->save();
            }
        }

        if (isset($request->instituciones)) {
            foreach ($request->instituciones as $institucion) {
                $academicaInstitucion = new ActividadFinanciacion;
                $academicaInstitucion->id_institucionfinanciadora = $institucion;
                $academicaInstitucion->id_extension = $extension->id;
                $academicaInstitucion->created_by = auth()->id();
                $academicaInstitucion->updated_by = auth()->id();
                $academicaInstitucion->is_valid = 1;
                $academicaInstitucion->save();
            }
        }

        if (isset($request->viajes)) {
            foreach ($request->viajes as $viaje) {
                $academicaViaje = new ActividadViaje;
                $academicaViaje->id_viaje = $viaje;
                $academicaViaje->id_extension = $extension->id;
                $academicaViaje->created_by = auth()->id();
                $academicaViaje->updated_by = auth()->id();
                $academicaViaje->is_valid = 1;
                $academicaViaje->save();
            }
        }

        return redirect('/actividadextension/' . $extension->id);
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

        $data = compact('extension');

        return view('actividad_extension.show', ['data' => $data]);
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
        $actividad = ActividadExtension::where('is_valid', '=', 1)->find($id);

        $data = compact('actividad');

        return view('actividad_extension.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActividadExtension  $actividadExtension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //return $request;

        $extension = ActividadExtension::find($id);


        $extension->id_financiamiento = $request->institucionFinanciadora;
        $extension->montofinanciado = $request->montofinanciado;

        $extension->tipo = $request->tipo;
        $extension->nombre = $request->nombre;
        $extension->publicoObjetivo = $request->publicoObjetivo;
        $extension->numeroParticipantes = $request->numeroParticipantes;
        //$extension->financiamiento = $request->financiamiento;
        $extension->comentarios = $request->comentarios;
        $extension->fecha_comienzo = $request->fecha_comienzo;
        $extension->fecha_termino = $request->fecha_termino;
        $extension->updated_by = auth()->id();
        $extension->is_valid = 1;

        $extension->save();


        require(__DIR__ . '/../../Helpers/Collection/collectiontostring.php'); //transformamos collecciones en arrays para hacer diferencias con el request(array)

        //participantes
        $losParticipantes = $extension->participantes()->select('personas.id')->get()->makeHidden('pivot');
        $losParticipantes = collectionToArrayId($losParticipantes);

        if (isset($request->participantes)) {
            //borrar
            $borrar = array_diff($losParticipantes, $request->participantes);
            PersonasActividadesExtension::where('id_actividad', '=', $extension->id)->whereIn('id_persona', $borrar)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
            //agregando
            $agregando = [];
            $agregando = array_diff($request->participantes, $losParticipantes);
            foreach ($agregando as $item) {
                $nuevoParticipante = new PersonasActividadesExtension;
                $nuevoParticipante->id_persona = $item;
                $nuevoParticipante->id_actividad = $extension->id;
                $nuevoParticipante->created_by = auth()->id();
                $nuevoParticipante->updated_by = auth()->id();
                $nuevoParticipante->is_valid = 1;
                $nuevoParticipante->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado a la actividad
            PersonasActividadesExtension::where('id_actividad', '=', $extension->id)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
        }

        return redirect('/actividadextension/' . $extension->id);
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
