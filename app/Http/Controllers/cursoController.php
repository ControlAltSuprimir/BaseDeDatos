<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\CursoDocente;
use App\Models\CursoAlumno;

use Illuminate\Http\Request;



use DB;


class cursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cursos.create');
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
        //return strtolower($curso->nivel);
        //return $request;

        //return auth()->id();

        $curso = new Curso;
        $curso->titulo = $request->titulo;
        $curso->id_institucion = $request->institucion;
        $curso->codigo = $request->codigo;
        $curso->categoria = strtolower($request->nivel);
        $curso->ano = $request->ano;
        $curso->periodo = $request->periodo;
        $curso->u_cursos = (isset($request->ucursos)) ? $request->ucursos : 0;
        $curso->url = $request->url;
        $curso->programa = $request->programa;
        $curso->alumnos = $request->alumnos;
        $curso->resumen = $request->resumen;
        $curso->comentarios = $request->comentarios;
        $curso->created_by = auth()->id();
        $curso->updated_by = auth()->id();
        $curso->is_valid = 1;

        $curso->save();

        if (isset($request->docentes)) {
            foreach ($request->docentes as $docente) {
                $newDocente = new CursoDocente;
                $newDocente->id_persona = $docente;
                $newDocente->id_curso = $curso->id;
                $newDocente->rol = "Docente";
                $newDocente->created_by = auth()->id();
                $newDocente->updated_by = auth()->id();
                $newDocente->is_valid = 1;
                $newDocente->save();
            }
        }

        if (isset($request->ayudantes)) {
            foreach ($request->ayudantes as $ayudante) {
                $newDocente = new CursoDocente;
                $newDocente->id_persona = $ayudante;
                $newDocente->id_curso = $curso->id;
                $newDocente->rol = "Ayudante";
                $newDocente->created_by = auth()->id();
                $newDocente->updated_by = auth()->id();
                $newDocente->is_valid = 1;
                $newDocente->save();
            }
        }
        if (isset($request->invitados)) {
            foreach ($request->invitados as $invitado) {
                $newDocente = new CursoDocente;
                $newDocente->id_persona = $invitado;
                $newDocente->id_curso = $curso->id;
                $newDocente->rol = "Invitado(a)";
                $newDocente->created_by = auth()->id();
                $newDocente->updated_by = auth()->id();
                $newDocente->is_valid = 1;
                $newDocente->save();
            }
        }

        if (isset($request->estudiantes)) {
            foreach ($request->estudiantes as $estudiante) {
                $newDocente = new CursoAlumno;
                $newDocente->id_persona = $estudiante;
                $newDocente->id_curso = $curso->id;
                $newDocente->rol = "Estudiante";
                $newDocente->created_by = auth()->id();
                $newDocente->updated_by = auth()->id();
                $newDocente->is_valid = 1;
                $newDocente->save();
            }
        }



        return redirect('/cursos/' . $curso->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $curso =Curso::find($id);
        if($curso->is_valid==1){
        $data=compact('curso');
        return view('cursos.show', ['data' => $data]);}
        else{
            return view('cursos.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = compact('id');
        return view('cursos.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $curso = Curso::find($id);
        $curso->titulo = $request->titulo;
        $curso->id_institucion = $request->institucion;
        $curso->codigo = $request->codigo;
        $curso->categoria = strtolower($request->nivel);
        $curso->ano = $request->ano;
        $curso->periodo = $request->periodo;
        $curso->u_cursos = $request->ucursos;
        //$curso->u_cursos = (isset($curso->u_cursos)) ? 1 : 0;
        $curso->url = $request->url;
        $curso->programa = $request->programa;
        $curso->alumnos = $request->alumnos;
        $curso->resumen = $request->resumen;
        $curso->comentarios = $request->comentarios;

        $curso->updated_by = auth()->id();

        //return $request;
        // Obteniendo datos previos del curso
        
        // Helper: Collection->array
        require(__DIR__ . '/../../Helpers/Collection/collectiontostring.php');

        //Profes 
        $losProfes = $curso->profes()->select('personas.id')->get()->makeHidden('pivot');
        $losProfes = collectionToArrayId($losProfes);
  
        if (isset($request->docentes)) {
            // Borrado    
            $borrar = [];
            $borrar = array_diff($losProfes, $request->docentes);
            CursoDocente::whereIn('id_persona', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->docentes, $losProfes);
            foreach($agregando as $agregue)
            {
                $nuevo = new CursoDocente;
                $nuevo->id_persona = $agregue;
                $nuevo->id_curso = $curso->id;
                $nuevo->rol = "Docente";
                $nuevo->created_by = auth()->id();
                $nuevo->updated_by = auth()->id();
                $nuevo->is_valid = 1;
                $nuevo->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo
            CursoDocente::whereIn('id_persona', $losProfes)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }

        //return $curso->profes()->select('personas.id')->get()->makeHidden('pivot');



        //Ayudantes
        $lesAyudantes = $curso->ayudantes('personas.id')->get()->makeHidden('pivot');
        $lesAyudantes = collectionToArrayId($lesAyudantes);

        if (isset($request->ayudantes)) {
            // Borrado    
            $borrar = [];
            $borrar = array_diff($lesAyudantes, $request->ayudantes);
            CursoDocente::whereIn('id_persona', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->ayudantes, $lesAyudantes);
            foreach($agregando as $agregue)
            {
                $nuevo = new CursoDocente;
                $nuevo->id_persona = $agregue;
                $nuevo->id_curso = $curso->id;
                $nuevo->rol = "Ayudante";
                $nuevo->created_by = auth()->id();
                $nuevo->updated_by = auth()->id();
                $nuevo->is_valid = 1;
                $nuevo->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo
            CursoDocente::whereIn('id_persona', $lesAyudantes)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }

        //Invitades
        $lesInvitades = $curso->invitades()->get()->makeHidden('pivot');
        $lesInvitades = collectionToArrayId($lesInvitades);


        if (isset($request->invitados)) {
            // Borrado    
            $borrar = [];
            $borrar = array_diff($lesInvitades, $request->invitados);
            CursoDocente::whereIn('id_persona', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->invitados, $lesInvitades);
            foreach($agregando as $agregue)
            {
                $nuevo = new CursoDocente;
                $nuevo->id_persona = $agregue;
                $nuevo->id_curso = $curso->id;
                $nuevo->rol = "Invitado(a)";
                $nuevo->created_by = auth()->id();
                $nuevo->updated_by = auth()->id();
                $nuevo->is_valid = 1;
                $nuevo->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo
            CursoDocente::whereIn('id_persona', $lesInvitades)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }

        // Alumnos
        $lesAlumnes = $curso->alumnos()->get()->makeHidden('pivot');
        $lesAlumnes = collectionToArrayId($lesAlumnes);


        if (isset($request->estudiantes)) {
            // Borrado    
            $borrar = [];
            $borrar = array_diff($lesAlumnes, $request->estudiantes);
            CursoAlumno::whereIn('id_persona', $borrar)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
            //Agregando
            $agregando =[];
            $agregando = array_diff($request->estudiantes, $lesAlumnes);
            foreach($agregando as $agregue)
            {
                $nuevo = new CursoAlumno;
                $nuevo->id_persona = $agregue;
                $nuevo->id_curso = $curso->id;
                $nuevo->rol = "Estudiante";
                $nuevo->created_by = auth()->id();
                $nuevo->updated_by = auth()->id();
                $nuevo->is_valid = 1;
                $nuevo->save();
            }
        } else {
            //Si el request está vacío entonces borramos todo
            CursoAlumno::whereIn('id_persona', $lesAlumnes)->update(['updated_by' =>auth()->id() , 'is_valid' => 0]);
        }

        //Guardando
        $curso->save();

        //return redirect('/cursos/'. $curso->id . '/edit');
        return redirect('/cursos/'. $curso->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
