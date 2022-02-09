<?php

namespace App\Http\Controllers;

use App\Models\Coloquios;
use App\Models\Personas;
use App\Models\Instituciones;
use Illuminate\Http\Request;

class coloquiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coloquios = Coloquios::where('is_valid', '=', 1)
            ->orderBy('fecha', 'desc')
            ->paginate(25);
        $data = compact('coloquios');
        return view('coloquios.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coloquios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $coloquio = new Coloquios;
        $coloquio->id_persona = $request->expositor;
        $coloquio->id_institucion = $request->institucion;
        $coloquio->titulo = $request->titulo;
        $coloquio->fecha = $request->fecha;
        $coloquio->abstract = $request->abstract;
        $coloquio->url = $request->url;
        $coloquio->youtube = $request->youtube;

        $coloquio->is_valid = 1;

        $coloquio->save();

        return redirect('/coloquios/'.$coloquio->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coloquios  $coloquios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $coloquio= Coloquios::find($id);
        $data=compact('coloquio');
        return view('coloquios.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coloquios  $coloquios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data=compact('id');
        return view('coloquios.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coloquios  $coloquios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //return $request;
        $coloquio = Coloquios::find($id);
        $coloquio->id_persona = $request->expositor;
        $coloquio->id_institucion = $request->institucion;
        $coloquio->titulo = $request->titulo;
        $coloquio->fecha = $request->fecha;
        $coloquio->abstract = $request->abstract;
        $coloquio->url = $request->url;
        $coloquio->youtube = $request->youtube;

        $coloquio->is_valid = 1;

        $coloquio->save();

        return redirect('/coloquios/'.$coloquio->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coloquios  $coloquios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coloquios $coloquios)
    {
        //
    }
}
