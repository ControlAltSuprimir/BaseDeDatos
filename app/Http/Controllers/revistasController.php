<?php

namespace App\Http\Controllers;

use App\Models\Revistas;
use App\Models\Indexaciones;
use App\Models\Indexaciones_Revistas;
use Illuminate\Http\Request;

class revistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $revistas = Revistas::where('is_valid', '=', 1)
            ->orderBy('nombre', 'asc')
            ->paginate(25);
        $data = compact('revistas');
        return view('revistas.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $option = 'revista';
        $data = compact('option');
        return view('revistas.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $revista = new Revistas;
        $revista->nombre = $request->nombre;
        $revista->alias = $request->alias;
        $revista->ISSN = $request->ISSN;
        $revista->is_valid = 1;
        if ($request->Fondecyt == 1) {
            $revista->Fondecyt = $request->Fondecyt;
            $revista->clasificacion_Fondecyt = $request->clasificacion_Fondecyt;
        } else {
            $revista->Fondecyt = 0;
        }
        //return $revista;
        $revista->save();

        //return $request->indexaciones;

        foreach ($request->indexaciones as $indexacion) {

            $indexada = new Indexaciones_Revistas;
            if (isset($indexacion[0])) //Chequeamos si existe la indexación
            {

                $indexada->id_Indexacion = $indexacion[0];

                $indexada->clasificacionQ = $indexacion[1];
                $indexada->impact_factor = $indexacion[2];
                $indexada->observaciones = $indexacion[3];
                $indexada->is_valid = 1;
                $indexada->id_Revista = $revista->id;
                $indexada->save();
            }
        }



        return redirect('/revistas/' . $revista->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revistas  $revistas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $revista = Revistas::find($id);
        //return $revista->indexacionesDetalles()->get();
        $detalles = $revista->indexacionesDetalles()->get();
        $tablaDeIndexaciones = [];
        foreach ($detalles as $detalle) {
            $tablaDeIndexaciones[] = array(
                'nombre' => Indexaciones::find($detalle->id_Indexacion)->nombre,
                'clasificacionQ' => $detalle->clasificacionQ,
                'impact_factor' => $detalle->impact_factor,
                'observaciones' => $detalle->observaciones,
            );
        }
        //return $tablaDeIndexaciones;

        $data = compact('revista', 'tablaDeIndexaciones');
        return view('revistas.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revistas  $revistas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = compact('id');
        return view('revistas.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Revistas  $revistas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revistas $revista)
    {
        //

        //return $indexaciones;
        
        //$revista = new Revistas;
        $revista->nombre = $request->nombre;
        $revista->alias = $request->alias;
        $revista->ISSN = $request->ISSN;
        if ($request->Fondecyt == 1) {
            $revista->Fondecyt = $request->Fondecyt;
            $revista->clasificacion_Fondecyt = $request->clasificacion_Fondecyt;
        } else {
            $revista->Fondecyt = 0;
        }
        //return $revista;
        $revista->save();
        

        Indexaciones_Revistas::where('id_Revista', '=', $revista->id)
                                            ->where('is_valid','=',1)
                                            ->update(['is_valid'=> 0]);

                                            
        if(isset($request->indexaciones)){

        foreach ($request->indexaciones as $indexacion) {


            if (isset($indexacion[0]) & isset($indexacion[4])) //Chequeamos si existe la indexación
            {
                $indexada = Indexaciones_Revistas::find($indexacion[4]);

                $indexada->id_Indexacion = $indexacion[0];

                $indexada->clasificacionQ = $indexacion[1];
                $indexada->impact_factor = $indexacion[2];
                $indexada->observaciones = $indexacion[3];
                $indexada->is_valid = 1;
                $indexada->save();
            }
            elseif(isset($indexacion[0])){
                //return $request;
                $indexada = new Indexaciones_Revistas;
                $indexada->id_Indexacion = $indexacion[0];
                $indexada->id_Revista = $revista->id;

                $indexada->clasificacionQ = $indexacion[1];
                $indexada->impact_factor = $indexacion[2];
                $indexada->observaciones = $indexacion[3];
                $indexada->is_valid = 1;
                
                $indexada->save();
            }
            elseif (is_null($indexacion[0])){}
            else
            {
                

            }
        }
    }

        return redirect('/revistas/' . $revista->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revistas  $revistas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revistas $revistas)
    {
        //
    }
}
