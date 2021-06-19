<?php

namespace App\Http\Controllers;

use App\Models\Tesis;
use App\Models\TesisInterna;
use App\Models\Personas;
use App\Models\Programas;
use Illuminate\Http\Request;

use DB;

class tesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tesis = Tesis::where('is_valid', '=', 1)->get();

        $data = compact('tesis');

        return view('tesis.index', ['data' => $data]);
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
        $allProgramas = Programas::where('is_valid', '=', 1)
            ->get();
        $data = compact('allPersonas', 'allProgramas');
        return view('tesis.create', ['data' => $data]);
        //return view('tesis.create');
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

        $tesis = new Tesis;
        $tesis->titulo = $request->titulo;
        $tesis->fechaDefensa = $request->fechaDefensa;
        $tesis->autor = $request->autor;
        $tesis->id_programa = $request->programa;
        $tesis->is_valid = 1;

        $tesis->save();

        if (in_array($request->programa, [1, 2, 3, 4])) {
            $tesisInterna = new TesisInterna;
            $tesisInterna->fechaProyecto = $request->fechaProyecto;
            $tesisInterna->id_tesis = $tesis->id;
            $tesisInterna->estado = $request->estado;
            //$tesisInterna->tesista = $request->autor;
            $tesisInterna->is_valid = 1;
            $tesisInterna->save();
        }

        DB::table('personas_tesis_tutores')->insert([
            'id_Persona' => $request->tutor,
            'id_tesis' => $tesis->id,
            'tipo' => 'Tutor',
            'is_valid' => 1
        ]);

        if (isset($request->cotutores)) {
            foreach ($request->cotutores as $cotutor) {
                if (isset($cotutor)) {
                    DB::table('personas_tesis_tutores')->insert([
                        'id_Persona' => $cotutor,
                        'id_tesis' => $tesis->id,
                        'tipo' => 'Cotutor(a)',
                        'is_valid' => 1
                    ]);
                }
            }
        }

        if (isset($request->comision)) {
            foreach ($request->comision as $comision) {
                if (isset($comision)) {
                    DB::table('personas_tesis_comision')->insert([
                        'id_Persona' => $comision,
                        'id_tesis' => $tesis->id,
                        'is_valid' => 1
                    ]);
                }
            }
        }


        if (isset($request->proyectos)) {
            foreach ($request->proyectos as $proyecto) {
                if (isset($proyecto)) {
                    DB::table('proyectos_tesistas')->insert([
                        'id_proyecto' => $proyecto,
                        'id_tesis' => $tesis->id,
                        'is_valid' => 1
                    ]);
                }
            }
        }

        if (isset($request->articulos)) {
            foreach ($request->articulos as $articulo) {
                if (isset($articulo)) {
                    DB::table('articulos_tesis')->insert([
                        'id_articulo' => $articulo,
                        'id_tesis' => $tesis->id,
                        'is_valid' => 1
                    ]);
                }
            }
        }


        return redirect('/tesis/' . $tesis->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tesis  $tesis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tesis= Tesis::find($id);
        $tesisInterna= TesisInterna::where('id_tesis','=',$id)->where('is_valid','=',1)->first();
        
        $data=compact('tesis','tesisInterna');

        return view('tesis.show',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tesis  $tesis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $value = $id;
        $data = compact('value');
        return view('tesis.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tesis  $tesis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        //return $request;

        $tesis = Tesis::find($id);
        $tesis->titulo = $request->titulo;
        $tesis->fechaDefensa = $request->fechaDefensa;
        $tesis->autor = $request->autor;
        $tesis->id_programa = $request->programa;
        $tesis->is_valid = 1;

        $tesis->save();


        if (in_array($request->programa, [1, 2, 3, 4])) {
            $tesisInterna = TesisInterna::where('is_valid', '=', 1)->where('id_tesis', '=', $tesis->id)->first();
            $tesisInterna->fechaProyecto = $request->fechaProyecto;
            //$tesisInterna->id_tesis = $tesis->id;
            $tesisInterna->estado = $request->estado;
            //$tesisInterna->tesista = $request->autor;
            $tesisInterna->is_valid = 1;
            $tesisInterna->save();
        }


        DB::table('personas_tesis_tutores')
            ->where('id_tesis', '=', $tesis->id)
            ->update(['is_valid' => 0]);

        DB::table('personas_tesis_tutores')->insert([
            'id_Persona' => $request->tutor,
            'id_tesis' => $tesis->id,
            'tipo' => 'Tutor',
            'is_valid' => 1
        ]);

        foreach ($request->cotutores as $cotutor) {
            if (isset($cotutor)) {
                DB::table('personas_tesis_tutores')->insert([
                    'id_Persona' => $cotutor,
                    'id_tesis' => $tesis->id,
                    'tipo' => 'Cotutor(a)',
                    'is_valid' => 1
                ]);
            }
        }

        DB::table('personas_tesis_comision')
            ->where('id_tesis', '=', $tesis->id)
            ->update(['is_valid' => 0]);

        foreach ($request->comision as $comision) {
            if (isset($comision)) {
                DB::table('personas_tesis_comision')->insert([
                    'id_Persona' => $comision,
                    'id_tesis' => $tesis->id,
                    'is_valid' => 1
                ]);
            }
        }

        DB::table('proyectos_tesistas')
            ->where('id_tesis', '=', $tesis->id)
            ->update(['is_valid' => 0]);

        foreach ($request->proyectos as $proyecto) {
            if (isset($proyecto)) {
                DB::table('proyectos_tesistas')->insert([
                    'id_proyecto' => $proyecto,
                    'id_tesis' => $tesis->id,
                    'is_valid' => 1
                ]);
            }
        }

        DB::table('articulos_tesis')
            ->where('id_tesis', '=', $tesis->id)
            ->update(['is_valid' => 0]);

        if (isset($request->articulos)) {
            foreach ($request->articulos as $articulo) {
                if (isset($articulo)) {
                    DB::table('articulos_tesis')->insert([
                        'id_articulo' => $articulo,
                        'id_tesis' => $tesis->id,
                        'is_valid' => 1
                    ]);
                }
            }
        }


        return redirect('/tesis/' . $tesis->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tesis  $tesis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tesis $tesis)
    {
        //
    }
}
