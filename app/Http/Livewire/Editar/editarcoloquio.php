<?php

namespace App\Http\Livewire\Editar;

use App\Models\Personas;
use App\Models\Revistas;
use App\Models\Articulos;
use App\Models\Coloquios;
use App\Models\Instituciones;
use App\Models\Proyectos;
use App\Models\Tesis;
use Livewire\Component;


class editarcoloquio extends Component
{
    public $allPersonas = [];
    public $allInstituciones = [];
    public $perfil;
    public $edit;

    public $expositor;
    public $institucion;

    public function mount($edit)
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido')->orderBy('segundo_apellido')->get();
        $this->allInstituciones = Instituciones::where('is_valid', '=', 1)->orderBy('nombre')->get();

        $id = $edit;
        $this->perfil = Coloquios::find($id);
        $this->expositor = $this->perfil->expositor();
        $this->institucion = $this->perfil->institucion();


    }

    public function render()
    {
        
        return view('livewire.editar.coloquio');
    }
}
