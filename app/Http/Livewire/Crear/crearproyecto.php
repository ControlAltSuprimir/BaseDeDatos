<?php

namespace App\Http\Livewire\Crear;


use App\Models\Personas;
use App\Models\Articulos;
use App\Models\Tesis;
use App\Models\ActividadAcademica;
use App\Models\ActividadExtension;
use App\Models\Revistas;
use Livewire\Component;

class crearproyecto extends Component
{
    public $orderProducts = [];
    public $orderColaboradores = [];
    public $allPersonas = [];
    public $extraPersonas = [];
    public $allArticulos = [];
    public $allTesis = [];
    public $allAcademica = [];
    public $allExtension = [];



    public $indices = [];



    public function mount()
    {
        $this->allPersonas = Personas::where('is_valid','=',1)->orderBy('primer_apellido')->get();
        $this->allArticulos = Articulos::where('is_valid','=',1)->orderBy('titulo')->get();
        $this->allTesis = Tesis::where('is_valid','=',1)->orderBy('titulo')->get();
        $this->allAcademica = ActividadAcademica::where('is_valid','=',1)->orderBy('nombre')->get();
        $this->allExtension = ActividadExtension::where('is_valid','=',1)->orderBy('nombre')->get();

        
    }

    
    // Render

    public function render()
    {
        return view('livewire.crear.proyectos');
    }
}
