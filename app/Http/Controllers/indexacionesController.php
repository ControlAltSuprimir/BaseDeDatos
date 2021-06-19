<?php

namespace App\Http\Controllers;

use App\Models\Indexaciones;
use App\Models\Revistas;
use Illuminate\Http\Request;

class indexacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $indexaciones = Indexaciones::where('is_valid', '=', 1)
            ->paginate(25);
        $data = compact('indexaciones');
        return view('indexaciones.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('indexaciones.create');
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
        $indexacion = new Indexaciones;
        $indexacion->nombre = $request->nombre;
        $indexacion->is_valid = 1;

        //return $persona;

        $indexacion->save();

        return redirect('/indexaciones/'.$indexacion->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Indexaciones  $indexaciones
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $indexacion = Indexaciones::find($id);

        $data = compact('indexacion');
        return view('indexaciones.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Indexaciones  $indexaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $indexacion = Indexaciones::find($id);
        $data = compact('indexacion');
        return view('indexaciones.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Indexaciones  $indexaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $indexacion=Indexaciones::find($id);
        //$persona = new Personas;
        $indexacion->nombre=$request->nombre;
        $indexacion->is_valid = 1;
        

        $indexacion->save();
        

        return redirect('/indexaciones/'.$indexacion->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indexaciones  $indexaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indexaciones $indexaciones)
    {
        //
    }
}
