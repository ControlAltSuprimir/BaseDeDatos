<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ListaAcademicos;
use App\Models\ListaArticulos;
use Illuminate\Http\Request;

class ListaAcademicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lista = ListaAcademicos::select('id','datos_personales','email','articulos','proyectos','area_investigacion','estudios','encode')->get();
        return $lista;
    }


    public function show($id)
    {
        $academico= ListaAcademicos::find($id); 
        return $academico;
    }


    public function showEncode($encode)
    {
        $academico= ListaAcademicos::where('datos_personales','=',$encode)->first(); //se busca por el link de la página, así se omite una búsqueda extra
        return $academico;
    }




    public function articulosPorAno($ano)
    {
        $lista = ListaArticulos::select('titulo','autores','revista','ano')->where('ano','=',$ano)->get();

        return $lista;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListaArticulos  $listaArticulos
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListaArticulos  $listaArticulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListaArticulos $listaArticulos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListaArticulos  $listaArticulos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListaArticulos $listaArticulos)
    {
        //
    }
}
