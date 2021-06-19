<?php

namespace App\Http\Controllers;

use App\Models\Instituciones;
use Illuminate\Http\Request;

class institucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instituciones = Instituciones::where('is_valid','=',1)
                                    ->get();
        $data= compact('instituciones');
        return view('instituciones.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('instituciones.create');
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
        $institucion = new Instituciones;
        $institucion->nombre = $request->nombre;
        $institucion->pais = $request->pais;
        $institucion->url = $request->url;
        $institucion->is_valid = 1;

        $institucion->save();

        return redirect('/instituciones/' . $institucion->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function show(Instituciones $instituciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $institucion=Instituciones::where('is_valid','=','1')->find($id);
        $data=compact('institucion');
        return view('instituciones.edit',['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $institucion = Instituciones::where('is_valid','=',1)->find($id);
        $institucion->nombre = $request->nombre;
        $institucion->pais = $request->pais;
        $institucion->url = $request->url;
        $institucion->is_valid = 1;

        $institucion->save();

        return redirect('/instituciones/' . $institucion->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instituciones  $instituciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instituciones $instituciones)
    {
        //
    }
}
