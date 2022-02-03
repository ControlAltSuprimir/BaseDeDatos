<?php

namespace App\Http\Livewire\Editar;


use App\Models\ActividadExtension;
use App\Models\Institucionfinanciadora;
use App\Models\Proyectos;
use App\Models\Personas;
use App\Models\PersonasActividadesAcademicas;
use App\Models\PersonasActividadesExtension;
use App\Models\ProyectosActividadesAcademicas;
use App\Models\ProyectosActividadesExtension;
use App\Models\Revistas;
use App\Models\Viajes;

use Livewire\Component;

class editarextension extends Component
{
    public $participantes = [];
    public $proyectos = [];

    public $allPersonas = [];
    public $allProyectos = [];
    public $allFinanciadoras = [];
    public $allViajes = [];

    public $perfil;
    public $edit;




    public function mount($edit)
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido')->orderBy('segundo_apellido')->get();
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->orderBy('titulo')->get();
        $this->allFinanciadoras = Institucionfinanciadora::where('is_valid', '=', 1)->get();

        $this->perfil = ActividadExtension::find($edit);
        $this->participantes= $this->perfil->participantes()->get();
        $this->proyectos=$this->perfil->proyectos()->get();

    }



    public function render()
    {
        return view('livewire.editar.actividadextension');
    }
}
