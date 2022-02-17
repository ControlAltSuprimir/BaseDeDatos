<?php

namespace App\Http\Controllers;

use App\Models\ActividadViaje;
use App\Models\Viajes;
use App\Models\Personas;
use App\Models\ViajeFinanciacion;
use Illuminate\Http\Request;

class viajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('viajes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /*$allPersonas = Personas::where('is_valid', '=', 1)
            ->get();
        $data = compact('allPersonas');*/
        //return view('viajes.create', ['data' => $data]);
        return view('viajes.create');
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
        return $request;

        $viaje = new Viajes;
        $viaje->id_persona = $request->persona;
        $viaje->fecha = $request->fecha;
        $viaje->paisOrigen = $request->paisOrigen;
        $viaje->ciudadOrigen = $request->ciudadOrigen;
        $viaje->paisDestino = $request->paisDestino;
        $viaje->ciudadDestino = $request->ciudadDestino;
        $viaje->comentarios = $request->comentarios;

        $viaje->is_valid = 1;
        $viaje->created_by = auth()->id();
        $viaje->updated_by = auth()->id();

        $viaje->save();

        //proyectos
        if (isset($request->proyectos)) {
            foreach ($request->proyectos as $item) {
                    $viaje_proyecto = new ViajeFinanciacion;
                    $viaje_proyecto->id_viaje = $viaje->id;
                    $viaje_proyecto->id_proyecto = $item;
                    $viaje_proyecto->created_by = auth()->id();
                    $viaje_proyecto->updated_by = auth()->id();
                    $viaje_proyecto->is_valid = 1;
                    $viaje_proyecto->save();
            }
        }

        //instituciones
        if (isset($request->instituciones)) {
            foreach ($request->instituciones as $item) {
                    $viaje_institucion = new ViajeFinanciacion;
                    $viaje_institucion->id_viaje = $viaje->id;
                    $viaje_institucion->id_institucion = $item;
                    $viaje_institucion->created_by = auth()->id();
                    $viaje_institucion->updated_by = auth()->id();
                    $viaje_institucion->is_valid = 1;
                    $viaje_institucion->save();
            }
        }

        //academicas
        if (isset($request->academicas)) {
            foreach ($request->academicas as $item) {
                    $viaje_academica = new ActividadViaje;
                    $viaje_academica->id_viaje = $viaje->id;
                    $viaje_academica->id_academica = $item;
                    $viaje_academica->created_by = auth()->id();
                    $viaje_academica->updated_by = auth()->id();
                    $viaje_academica->is_valid = 1;
                    $viaje_academica->save();
            }
        }

        //extensiones
        if (isset($request->extension)) {
            foreach ($request->extension as $item) {
                    $viaje_extension = new ActividadViaje;
                    $viaje_extension->id_viaje = $viaje->id;
                    $viaje_extension->id_extension = $item;
                    $viaje_extension->created_by = auth()->id();
                    $viaje_extension->updated_by = auth()->id();
                    $viaje_extension->is_valid = 1;
                    $viaje_extension->save();
            }
        }

        return redirect('/viajes/' . $viaje->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $viaje =Viajes::find($id);
        $data=compact('viaje');
        return view('viajes.show', ['data'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $viaje = Viajes::find($id);
        $data = compact('viaje');
        return view('viajes.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Viajes $viaje)
    {
        //
        //return $request;

        $viaje->fecha = $request->fecha;
        $viaje->paisOrigen = $request->paisOrigen;
        $viaje->ciudadOrigen = $request->ciudadOrigen;
        $viaje->paisDestino = $request->paisDestino;
        $viaje->ciudadDestino = $request->ciudadDestino;
        $viaje->comentarios = $request->comentarios;

        $viaje->updated_by = auth()->id();

        $viaje->save();

        //actualizando relaciones

        require(__DIR__ . '/../../Helpers/Collection/collectiontostring.php');

        //proyectos
        
        $losProyectos = $viaje->proyectos()->select('proyectos.id')->get();
        $losProyectos = collectionToArrayId($losProyectos);
        
        //nuevos proyectos
        if (isset($request->proyectos)) {
            // Borrado    
            $borrar = [];
            $borrar = array_diff($losProyectos, $request->proyectos);
            ViajeFinanciacion::where('id_viaje','=',$viaje->id)->whereNotNull('id_proyecto')->whereIn('id_proyecto', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->proyectos, $losProyectos);

            foreach ($agregando as $item) {
                    $participante = new ViajeFinanciacion;
                    $participante->id_proyecto = $item;
                    $participante->id_viaje = $viaje->id;
                    $participante->updated_by = auth()->id();
                    $participante->created_by = auth()->id();
                    $participante->is_valid = 1;
                    $participante->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado al proyecto
            ViajeFinanciacion::where('id_viaje','=',$viaje->id)->whereNotNull('id_proyecto')->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }

        ///////////////////////////////

        //instituciones
        
        $lasInstituciones = $viaje->institucionesFinanciadoras()->select('institucionfinanciadora.id')->get();
        $lasInstituciones = collectionToArrayId($lasInstituciones);
        
        //nuevas instituciones
        if (isset($request->instituciones)) {
            // Borrado    
            $borrar = [];
            $borrar = array_diff($lasInstituciones, $request->instituciones);
            ViajeFinanciacion::where('id_viaje','=',$viaje->id)->whereNotNull('id_institucion')->whereIn('id_institucion', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->instituciones, $lasInstituciones);

            foreach ($agregando as $item) {
                    $participante = new ViajeFinanciacion;
                    $participante->id_institucion = $item;
                    $participante->id_viaje = $viaje->id;
                    $participante->updated_by = auth()->id();
                    $participante->created_by = auth()->id();
                    $participante->is_valid = 1;
                    $participante->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado al proyecto
            ViajeFinanciacion::where('id_viaje','=',$viaje->id)->whereNotNull('id_institucion')->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }

        
        ///////////////////////////////

        //actividades académicas
        
        $lasAcademicas = $viaje->academicas()->select('actividadacademica.id')->get();
        $lasAcademicas = collectionToArrayId($lasAcademicas);
        
        //nuevas instituciones
        if (isset($request->academicas)) {
            // Borrado    
            $borrar = [];
            $borrar = array_diff($lasAcademicas, $request->academicas);
            ActividadViaje::where('id_viaje','=',$viaje->id)->whereNotNull('id_academica')->whereIn('id_academica', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->academicas, $lasAcademicas);

            foreach ($agregando as $item) {
                    $participante = new ActividadViaje;
                    $participante->id_academica = $item;
                    $participante->id_viaje = $viaje->id;
                    $participante->updated_by = auth()->id();
                    $participante->created_by = auth()->id();
                    $participante->is_valid = 1;
                    $participante->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado al proyecto
            ActividadViaje::where('id_viaje','=',$viaje->id)->whereNotNull('id_academica')->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }

        //actividades extensión
        
        $lasExtensiones = $viaje->extensiones()->select('actividadextension.id')->get();
        $lasExtensiones = collectionToArrayId($lasExtensiones);
        
        //nuevas instituciones
        if (isset($request->extension)) {
            // Borrado    
            $borrar = [];
            $borrar = array_diff($lasExtensiones, $request->extension);
            ActividadViaje::where('id_viaje','=',$viaje->id)->whereNotNull('id_extension')->whereIn('id_extension', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->extension, $lasExtensiones);

            foreach ($agregando as $item) {
                    $participante = new ActividadViaje;
                    $participante->id_extension = $item;
                    $participante->id_viaje = $viaje->id;
                    $participante->updated_by = auth()->id();
                    $participante->created_by = auth()->id();
                    $participante->is_valid = 1;
                    $participante->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo lo asociado al proyecto
            ActividadViaje::where('id_viaje','=',$viaje->id)->whereNotNull('id_extension')->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }

        return redirect('/viajes/' . $viaje->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Viajes $viajes)
    {
        //
    }
}
