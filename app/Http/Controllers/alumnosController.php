<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;
use App\Models\Curso;
use App\Models\CursoAlumno;
use App\Models\Coloquios;

class alumnosController extends Controller
{
    //
    public function index($estudiantes)
    {
        if ($estudiantes == 'estudiantes' || $estudiantes == 'exestudiantes') {
            $data = compact('estudiantes');
            return view('estudiantes.index', ['data' => $data]);
        }
        return view('errors.404');
    }

    public function indexPrograma($estudiantes, $programa)
    {
        $lista = ['licenciatura', 'pedagogia', 'magister', 'doctorado'];
        if ($estudiantes == 'estudiantes' || $estudiantes == 'exestudiantes') {
            if (in_array($programa, $lista)) {


                $data = compact('estudiantes','programa');
                return view('estudiantes.indexprograma', ['data' => $data]);
            }
        }
        return view('errors.404');
    }
}
