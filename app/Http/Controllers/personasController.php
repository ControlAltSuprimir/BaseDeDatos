<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\Academicos;
use Illuminate\Http\Request;

class personasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personas = Personas::where('is_valid', '=', 1)
            ->orderBy('primer_apellido', 'asc')
            ->paginate(25);
        $data = compact('personas');
        return view('personas.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('personas.create');
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

        $persona = new Personas;
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

        //return $persona;

        $persona->save();

        $persona->id;

        return redirect('/personas/' . $persona->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $persona = Personas::findOrFail($id);

        $academico = Academicos::where('id_Persona', '=', $id)->where('is_valid', '=', 1)->first();
        //$articulos = $persona->articulos;
        if (is_null($academico)) {
            $data = compact('persona');
            return view('personas.show', ['data' => $data]);
        } else {
            $data = compact('academico');
            return  view('academicos.show', ['data' => $data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $persona = Personas::find($id);
        $data = compact('persona');
        return view('personas.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //return $id;

        $persona = Personas::find($id);
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


        return redirect('/personas/' . $persona->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $persona = Personas::find($id);
        $persona->is_valid = 0;

        return redirect('/personas');
    }
}
