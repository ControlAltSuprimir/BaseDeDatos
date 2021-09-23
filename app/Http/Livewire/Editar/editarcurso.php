<?php

namespace App\Http\Livewire\Editar;

use App\Models\Personas;
use App\Models\Instituciones;
use App\Models\Curso;
use App\Models\CursoDocente;
use App\Models\CursoAlumno;
use App\Models\Tesis;
use App\Models\ArticulosTesis;
use App\Models\ProyectosArticulos;
use App\Models\Indexaciones_Revistas;
use Illuminate\Http\Request;
use App\Models\Indexaciones;
use Livewire\Component;

class editarcurso extends Component
{

    public $allPersonas = [];
    public $allInstituciones = [];

    public $perfil;
    public $profes = [];
    public $ayudantes = [];
    public $invitades = [];
    public $alumnes= [];
    public $edit;


    public function mount($edit)
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido')->get();
        $this->allInstituciones = Instituciones::where('is_valid', '=', 1)->orderBy('nombre')->get();


        $id = $edit;
        $curso = Curso::find($id);
        $this->perfil = $curso;
        $losProfes = $curso->profes()->get();
        $lesAyudantes = $curso->ayudantes()->get();
        $lesInvitades = $curso->invitades()->get();
        $lesAlumnes = $curso->alumnos()->get();


        foreach($losProfes as $profe){
            $this->profes[] = $profe->id;
        }
        foreach($lesAyudantes as $profe){
            $this->ayudantes[] = $profe->id;
        }
        foreach($lesInvitades as $profe){
            $this->invitades[] = $profe->id;
        }
        foreach($lesAlumnes as $profe){
            $this->alumnes[] = $profe->id;
        }
        
        
        
    }



    public function render()
    {
        return view('livewire.editar.cursos');
    }
}
