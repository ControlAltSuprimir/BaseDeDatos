<?php

namespace App\Http\Livewire\Crear;

use App\Models\Proyectos;
use App\Models\Personas;
use App\Models\Institucionfinanciadora;
use Livewire\Component;

class crearacademica extends Component
{
    public $allPersonas = [];
    public $allProyectos = [];
    public $allFinanciadoras = [];


    public function mount()
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->get();
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->get();
        $this->allFinanciadoras = Institucionfinanciadora::where('is_valid', '=', 1)->get();
    }

    public function render()
    {
        return view('livewire.crear.actividadacademica');
    }
}
