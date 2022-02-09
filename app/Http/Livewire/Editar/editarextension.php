<?php

namespace App\Http\Livewire\Editar;


use App\Models\ActividadExtension;
use App\Models\Institucionfinanciadora;
use App\Models\Proyectos;
use App\Models\Personas;
use App\Models\Viajes;

use Livewire\Component;

class editarextension extends Component
{

    public $participantes = [];
    public $proyectos = [];
    public $instituciones = [];
    public $viajes = [];

    public $allPersonas = [];
    public $allProyectos = [];
    public $allFinanciadoras = [];
    public $allViajes = [];

    public $perfil;
    public $edit;



    public function mount($edit)
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido','asc')->orderBy('segundo_apellido','asc')->orderBy('primer_nombre','asc')->orderBy('segundo_nombre','asc')->get();
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->orderBy('titulo','asc')->get();
        $this->allFinanciadoras = Institucionfinanciadora::where('is_valid', '=', 1)->get();
        $this->allViajes = Viajes::where('is_valid', '=', 1)->get();

        $this->perfil = ActividadExtension::find($edit);

   

    }



    public function render()
    {
        include(__DIR__ . '../../../../Helpers/Collection/collectiontostring.php');
        $this->participantes = collectionToArrayId($this->perfil->participantes()->get());
        $this->proyectos = collectionToArrayId($this->perfil->proyectosFinanciantes()->get());
        $this->instituciones = collectionToArrayId($this->perfil->institucionesFinanciantes()->get());
        $this->viajes = collectionToArrayId($this->perfil->viajes()->get());

        return view('livewire.editar.actividadextension');
    }
}
