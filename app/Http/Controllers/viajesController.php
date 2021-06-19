<?php

namespace App\Http\Controllers;

use App\Models\Viajes;
use App\Models\Personas;
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
        $allPersonas = Personas::where('is_valid', '=', 1)
            ->get();
        $data = compact('allPersonas');
        return view('viajes.create', ['data' => $data]);
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

        $viaje = new Viajes;
        $viaje->id_persona = $request->persona;
        $viaje->fecha = $request->fecha;
        $viaje->paisOrigen = $request->paisOrigen;
        $viaje->ciudadOrigen = $request->ciudadOrigen;
        $viaje->paisDestino = $request->paisDestino;
        $viaje->ciudadDestino = $request->ciudadDestino;
        $viaje->financiamiento = $request->financiamiento;
        $viaje->is_valid = 1;

        $viaje->save();

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

        $viaje->fecha = $request->fecha;
        $viaje->paisOrigen = $request->paisOrigen;
        $viaje->ciudadOrigen = $request->ciudadOrigen;
        $viaje->paisDestino = $request->paisDestino;
        $viaje->ciudadDestino = $request->ciudadDestino;
        $viaje->financiamiento = $request->financiamiento;
        $viaje->is_valid = 1;

        $viaje->save();

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
