<?php

namespace App\Http\Livewire\Crear;

use App\Models\Instituciones;
use App\Models\Proyectos;
use App\Models\Personas;
use App\Models\Institucionfinanciadora;
use App\Models\Viajes;
use Livewire\Component;

class crearcoloquio extends Component
{
    public $allPersonas = [];
    public $allInstituciones = [];


    public function mount()
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido','asc')->orderBy('segundo_apellido','asc')->orderBy('primer_nombre','asc')->orderBy('segundo_nombre','asc')->get();
        $this->allInstituciones = Instituciones::where('is_valid', '=', 1)->get();
    }

    public function render()
    {
        return view('livewire.crear.coloquio');
    }
}
