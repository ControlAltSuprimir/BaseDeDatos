<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Academicos;
use App\Models\Personas;
use App\Models\Viajes;

use Illuminate\Http\Request;

class academicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $academicos = Academicos::select('academicos.*')
            ->where('academicos.is_valid','=',1)
            ->join('personas', 'personas.id', '=', 'academicos.id_Persona')
            ->orderBy('personas.primer_apellido')
            ->paginate(25);
        
        $data = compact('academicos');
        return view('academicos.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $allPersonas = Personas::where('is_valid', '=', 1)
            ->orderBy('primer_apellido')
            ->get();
        $data = compact('allPersonas');
        return view('academicos.create', ['data' => $data]);
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
        $academico = new Academicos;
        $academico->id_Persona = $request->persona;
        $academico->comienzo = $request->comienzo;
        $academico->termino = $request->termino;
        $academico->carrera = $request->carrera;
        $academico->jerarquia = $request->jerarquia;
        $academico->oficina = $request->oficina;
        $academico->telefono = $request->telefono;
        $academico->horas_Semanales = $request->horas_Semanales;
        $academico->is_valid = 1;

        $academico->save();

        return redirect('/academicos/' . $academico->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Academicos  $academicos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $academico = Academicos::where('is_valid', '=', 1)->find($id);
        $viajes = Viajes::where('id_persona', '=', $academico->persona->id)->where('is_valid', '=', 1)->get();
        $data = compact('academico', 'viajes');
        return  view('academicos.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Academicos  $academicos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $academico = Academicos::find($id);
        $persona = Personas::find($academico->id_Persona);

        $data = compact('academico', 'persona');

        return view('academicos.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Academicos  $academicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academicos $academico)
    {
        //
        //return $request;
        $persona = Personas::find($academico->id_Persona);
        //$persona = new Personas;

        $persona->primer_nombre = $request->primer_nombre;
        $persona->segundo_nombre = $request->segundo_nombre;
        $persona->primer_apellido = $request->primer_apellido;
        $persona->segundo_apellido = $request->segundo_apellido;
        $persona->alias = $request->alias;
        $persona->email = $request->email;
        $persona->rut =  $request->rut;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->telefono =  $request->telefono;
        $persona->is_valid = 1;


        $persona->save();


        //$academico->id_Persona = $request->persona;
        $academico->comienzo = $request->comienzo;
        $academico->termino = $request->termino;
        $academico->carrera = $request->carrera;
        $academico->jerarquia = $request->jerarquia;
        $academico->oficina = $request->oficina;
        $academico->telefono = $request->telefono_oficina;
        $academico->horas_Semanales = $request->horas_Semanales;
        $academico->is_valid = 1;

        $academico->save();

        return redirect('/academicos/' . $academico->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Academicos  $academicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academicos $academicos)
    {
        //
    }
}
