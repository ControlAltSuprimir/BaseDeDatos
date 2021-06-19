<?php

namespace App\Http\Controllers;

use App\Models\PersonasProgramas;
use Illuminate\Http\Request;

class personasprogramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 1;
        return view();
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
     * @param  \App\Models\Comisiones  $comisiones
     * @return \Illuminate\Http\Response
     */
    public function show(PersonasProgramas $comisiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comisiones  $comisiones
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonasProgramas $comisiones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comisiones  $comisiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonasProgramas $comisiones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comisiones  $comisiones
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonasProgramas $comisiones)
    {
        //
    }
}
