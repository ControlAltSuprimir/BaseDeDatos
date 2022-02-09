<?php

namespace App\Http\Livewire\Formularios;

use App\Models\Proyectos;
use App\Models\Academicos;
use App\Models\Institucionfinanciadora;
use App\Models\Viajes;
use Livewire\Component;

class viajesformulario extends Component
{
    public $allAcademicos = [];
    public $allProyectos = [];

    public function mount()
    {
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->orderBy('titulo','asc')->get();
        $this->allAcademicos =  Academicos::with('persona')->select('academicos.*')
        ->where('academicos.is_valid','=',1)
        ->join('personas', 'personas.id', '=', 'academicos.id_Persona')
        ->orderBy('personas.primer_apellido')
        ->orderBy('personas.segundo_apellido')
        ->get();
    }

    public function render()
    {
        return view('livewire.formularios.viajesformulario');
    }
}
