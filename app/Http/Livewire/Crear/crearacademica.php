<?php

namespace App\Http\Livewire\Crear;

use App\Models\Proyectos;
use App\Models\Personas;
use App\Models\Institucionfinanciadora;
use App\Models\Viajes;
use Livewire\Component;

class crearacademica extends Component
{
    public $allPersonas = [];
    public $allProyectos = [];
    public $allFinanciadoras = [];
    public $allViajes = [];


    public function mount()
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido','asc')->orderBy('segundo_apellido','asc')->orderBy('primer_nombre','asc')->orderBy('segundo_nombre','asc')->get();
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->orderBy('titulo','asc')->get();
        $this->allFinanciadoras = Institucionfinanciadora::where('is_valid', '=', 1)->get();
        $this->allViajes = Viajes::where('is_valid', '=', 1)->get();
    }

    public function render()
    {
        return view('livewire.crear.actividadacademica');
    }
}
