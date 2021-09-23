<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Personas;
use App\Models\PTU;

class estudiantesController extends Controller
{
    public function index($estudiantes)
    {
        if ($estudiantes == 'estudiantes' || $estudiantes == 'exestudiantes') {
            $data = compact('estudiantes');
            return view('estudiantes.index', ['data' => $data]);
        }
        return view('errors.404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estudiantes.create');
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
        if (count($request->estudiante)==0) {
            return redirect('estudiantes');
        }

        $coincidencias = [];

        foreach ($request->estudiante as $estudiante) {
            
            $personaRut = Personas::where('rut', '=', $estudiante['rut'])
                                ->where('is_valid', '=', 1)
                                ->get();
            $personaNombre = Personas::where('primer_nombre', '=', $estudiante['primer_nombre'])
                                    ->where('primer_apellido', '=', $estudiante['primer_apellido'])
                                    ->where('is_valid', '=', 1)
                                    ->get();
            $coincidencias[] = array(
                'estudiante' => $estudiante,
                'coleccion' => $personaRut->merge($personaNombre)
            );
        }
        $programa = array(
            'id' => $request->programa,
            'comienzo' => $request->comienzo,
            'termino' => $request->termino
        );
        $data=compact('coincidencias','programa');
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $persona = Personas::find($id);
        $cursos = $persona->cursos();
        $ptu =PTU::where('is_valid','=',1)->where('id_persona','=',$id)->first();
        
        $data = compact('persona','cursos','ptu');

        return view('estudiantes.show' , ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    public function indexPrograma($estudiantes, $programa)
    {
        $lista = ['licenciatura', 'pedagogia', 'magister', 'doctorado'];
        if ($estudiantes == 'estudiantes' || $estudiantes == 'exestudiantes') {
            if (in_array($programa, $lista)) {


                $data = compact('estudiantes', 'programa');
                return view('estudiantes.indexprograma', ['data' => $data]);
            }
        }
        return view('errors.404');
    }

    public function check($request)
    {
        
    }
}
