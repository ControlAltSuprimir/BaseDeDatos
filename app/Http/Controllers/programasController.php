<?php

namespace App\Http\Controllers;

use App\Models\Programas;
use App\Models\Instituciones;
use Illuminate\Http\Request;

class programasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programas = Programas::with('institucion')->where('is_valid','=',1)
                                ->get();

        $data=compact('programas');
        return view('programas.index',['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $allInstituciones = Instituciones::where('is_valid', '=', 1)
            ->get();
        $data = compact('allInstituciones');
        return view('programas.create', ['data' => $data]);
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
        $programa = new Programas;
        if (isset($request->institucion)) {
            $programa->id_Institucion = $request->institucion;
        } else {
            $institucion = new Instituciones;
            $institucion->nombre = $request->otraInstitucion;
            $institucion->is_valid = 1;
            $institucion->save();
            $programa->id_Institucion = $institucion->id;
        }
        $programa->nombre = $request->nombre;
        $programa->grado = $request->grado;
        $programa->is_valid = 1;

        $programa->save();

        return redirect('/programas/' . $programa->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programas  $programas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $programa=Programas::find($id);
        $data=compact('programa');
        return view('programas.show',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programas  $programas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $programa=Programas::find($id);
        $allInstituciones = Instituciones::where('is_valid', '=', 1)
            ->get();
        
        $data = compact('allInstituciones','programa');
        return view('programas.edit', ['data' => $data]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programas  $programas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        
        $programa = Programas::find($id);
        if (isset($request->institucion)) {
            $programa->id_Institucion = $request->institucion;
        } else {
            $institucion = new Instituciones;
            $institucion->nombre = $request->otraInstitucion;
            $institucion->is_valid = 1;
            $institucion->save();
            $programa->id_Institucion = $institucion->id;
        }
        $programa->nombre = $request->nombre;
        $programa->grado = $request->grado;
        $programa->is_valid = 1;

        $programa->save();

        return redirect('/programas/' . $programa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programas  $programas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programas $programas)
    {
        //
    }
}
