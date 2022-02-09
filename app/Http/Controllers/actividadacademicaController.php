<?php

namespace App\Http\Controllers;

use App\Models\ActividadAcademica;
use App\Models\ActividadFinanciacion;
use App\Models\ActividadViaje;
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
        $actividades = ActividadAcademica::where('is_valid', '=', 1)->get();
        $data = compact('actividades');
        return view('actividad_academica.index', ['data' => $data]);
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
        //$academica->financiamiento = $request->financiamiento;
        $academica->participacion = $request->participacion;
        $academica->fecha_comienzo = $request->fecha_comienzo;
        $academica->fecha_termino = $request->fecha_termino;
        $academica->comentarios = $request->comentarios;
        $academica->created_by = auth()->id();
        $academica->updated_by = auth()->id();
        $academica->is_valid = 1;

        $academica->save();


        if (isset($request->participantes)) {
            foreach ($request->participantes as $participante) {

                $nuevoParticipante = new PersonasActividadesAcademicas;
                $nuevoParticipante->id_persona = $participante;
                $nuevoParticipante->id_academica = $academica->id;
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
                $academicaProyecto->id_academica = $academica->id;
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
                $academicaInstitucion->id_academica = $academica->id;
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
                $academicaViaje->id_academica = $academica->id;
                $academicaViaje->created_by = auth()->id();
                $academicaViaje->updated_by = auth()->id();
                $academicaViaje->is_valid = 1;
                $academicaViaje->save();
            }
        }


        return redirect('/actividadacademica/' . $academica->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActividadAcademica  $actividadAcademica
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $academica = ActividadAcademica::find($id);
        $data = compact('academica');

        return view('actividad_academica.show', ['data' => $data]);
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
        $actividad = ActividadAcademica::where('is_valid', '=', 1)->find($id);

        $data = compact('actividad');

        return view('actividad_academica.edit', ['data' => $data]);
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

        $academica = ActividadAcademica::find($id);

        $academica->id_financiamiento = $request->institucionFinanciadora;
        $academica->montofinanciado = $request->montofinanciado;
        

        $academica->tipo = $request->tipo;
        $academica->nombre = $request->nombre;
        $academica->participacion = $request->participacion;
        $academica->fecha_comienzo = $request->fecha_comienzo;
        $academica->fecha_termino = $request->fecha_termino;
        $academica->comentarios = $request->comentarios;
        $academica->updated_by = auth()->id();
        $academica->is_valid = 1;

        $academica->save();

       

        require(__DIR__ . '/../../Helpers/Collection/collectiontostring.php');//transformamos collecciones en arrays para hacer diferencias con el request(array)

        //participantes
        $losParticipantes = $academica->participantes()->select('personas.id')->get()->makeHidden('pivot');
        $losParticipantes = collectionToArrayId($losParticipantes);

        if (isset($request->participantes)) {
            //borrar
            $borrar = array_diff($losParticipantes, $request->participantes);
            PersonasActividadesAcademicas::where('id_academica','=',$academica->id)->whereIn('id_persona', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //agregando
            $agregando =[];
            $agregando = array_diff($request->participantes, $losParticipantes);
            foreach ($agregando as $item) {
                $nuevoParticipante = new PersonasActividadesAcademicas;
                $nuevoParticipante->id_persona = $item;
                $nuevoParticipante->id_academica = $academica->id;
                $nuevoParticipante->created_by = auth()->id();
                $nuevoParticipante->updated_by = auth()->id();
                $nuevoParticipante->is_valid = 1;
                $nuevoParticipante->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado a la actividad
            PersonasActividadesAcademicas::where('id_academica','=',$academica->id)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }


        //proyectos involucrados
        $losProyectosInvolucrados = $academica->proyectosFinanciantes()->select('proyectos.id')->get();
        $losProyectosInvolucrados = collectionToArrayId($losProyectosInvolucrados);

        if (isset($request->proyectos)) {
            //borrar
            $borrar = array_diff($losProyectosInvolucrados, $request->proyectos);
            ActividadFinanciacion::where('id_academica', '=', $academica->id)->whereNotNull('id_proyecto')->whereIn('id_proyecto', $borrar)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
            //agregando
            $agregando = [];
            $agregando = array_diff($request->proyectos, $losProyectosInvolucrados);
            foreach ($agregando as $item) {
                $academicaProyecto = new ActividadFinanciacion;
                $academicaProyecto->id_proyecto = $item;
                $academicaProyecto->id_academica = $academica->id;
                $academicaProyecto->created_by = auth()->id();
                $academicaProyecto->updated_by = auth()->id();
                $academicaProyecto->is_valid = 1;
                $academicaProyecto->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado a la actividad
            ActividadFinanciacion::where('id_academica', '=', $academica->id)->whereNotNull('id_proyecto')->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
        }


        //instituciones involucrados
        
        $lasInstitucionesInvolucradas = $academica->institucionesFinanciantes()->select('institucionfinanciadora.id')->get();
        $lasInstitucionesInvolucradas = collectionToArrayId($lasInstitucionesInvolucradas);

        if (isset($request->instituciones)) {
            //borrar
            $borrar = array_diff($lasInstitucionesInvolucradas, $request->instituciones);
            ActividadFinanciacion::where('id_academica', '=', $academica->id)->whereNotNull('id_institucionfinanciadora')->whereIn('id_institucionfinanciadora', $borrar)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
            //agregando
            $agregando = [];
            $agregando = array_diff($request->instituciones, $lasInstitucionesInvolucradas);
            foreach ($agregando as $item) {
                $academicaProyecto = new ActividadFinanciacion;
                $academicaProyecto->id_institucionfinanciadora = $item;
                $academicaProyecto->id_academica = $academica->id;
                $academicaProyecto->created_by = auth()->id();
                $academicaProyecto->updated_by = auth()->id();
                $academicaProyecto->is_valid = 1;
                $academicaProyecto->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado a la actividad
            ActividadFinanciacion::where('id_academica', '=', $academica->id)->whereNotNull('id_institucionfinanciadora')->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
        }


        //viajes involucrados
        
        $losViajesInvolucrados = $academica->viajes()->select('viajes.id')->get();
        $losViajesInvolucrados = collectionToArrayId($losViajesInvolucrados);

        if (isset($request->viajes)) {
            //borrar
            $borrar = array_diff($losViajesInvolucrados, $request->viajes);
            ActividadViaje::where('id_academica', '=', $academica->id)->whereIn('id_viaje', $borrar)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
            //agregando
            $agregando = [];
            $agregando = array_diff($request->viajes, $losViajesInvolucrados);
            foreach ($agregando as $item) {
                $academicaProyecto = new ActividadViaje;
                $academicaProyecto->id_viaje = $item;
                $academicaProyecto->id_academica = $academica->id;
                $academicaProyecto->created_by = auth()->id();
                $academicaProyecto->updated_by = auth()->id();
                $academicaProyecto->is_valid = 1;
                $academicaProyecto->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado a la actividad
            ActividadViaje::where('id_academica', '=', $academica->id)->update(['updated_by' => auth()->id(), 'is_valid' => 0]);
        }




        return redirect('/actividadacademica/' . $academica->id);
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
