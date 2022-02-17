<?php

namespace App\Http\Livewire\Crear;

use App\Models\Academicos;
use App\Models\ActividadAcademica;
use App\Models\ActividadExtension;
use App\Models\Proyectos;
use App\Models\Institucionfinanciadora;

use Livewire\Component;

class crearviajes extends Component
{
    //menues
    public $allAcademicos = [];
    public $allProyectos = [];
    public $allInstituciones = [];
    public $allAcademicas = [];
    public $allExtensiones = [];

    
    


    public function mount()
    {
        $this->allProyectos = Proyectos::where('is_valid','=',1)->orderBy('titulo')->get();
        $this->allInstituciones = Institucionfinanciadora::where('is_valid','=',1)->get();
        $this->allAcademicas = ActividadAcademica::where('is_valid','=',1)->get();
        $this->allExtensiones = ActividadExtension::where('is_valid','=',1)->get();

        $this->allAcademicos =  Academicos::with('persona')->select('academicos.*')
            ->where('academicos.is_valid', '=', 1)
            ->join('personas', 'personas.id', '=', 'academicos.id_Persona')
            ->orderBy('personas.primer_apellido')
            ->orderBy('personas.segundo_apellido')
            ->get();
    }

    public function render()
    {
        return view('livewire.crear.viajes');
    }
}
