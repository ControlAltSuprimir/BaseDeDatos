<?php

namespace App\Http\Livewire\Editar;


use App\Models\ActividadAcademica;
use App\Models\Proyectos;
use App\Models\Personas;
use App\Models\Institucionfinanciadora;

use Livewire\Component;

class editaracademica extends Component
{
    public $participantes = [];
    public $extraParticipantes= [];
    public $proyectos = [];

    public $allPersonas = [];
    public $allProyectos = [];
    public $allFinanciadoras = [];
    public $allViajes = [];

    public $perfil;
    public $edit;




    public function mount($edit)
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido')->get();
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->orderBy('titulo')->get();
        $this->allFinanciadoras = Institucionfinanciadora::where('is_valid', '=', 1)->get();

        $this->perfil = ActividadAcademica::find($edit);
        $this->participantes = $this->perfil->participantes()->get();
        $this->proyectos = $this->perfil->proyectos()->get();

    }


    public function render()
    {
        return view('livewire.editar.actividadacademica');
    }
}
