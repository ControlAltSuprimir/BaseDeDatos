<?php

namespace App\Http\Livewire\Crear;


use App\Models\Personas;
use App\Models\Tesis;
use App\Models\Revistas;
use App\Models\Proyectos;
use Livewire\Component;

class creararticulo extends Component
{
    public $orderProducts = [];
    public $allPersonas = [];
    public $extraPersonas = [];
    public $allRevistas = [];
    public $allProyectos = [];
    public $allTesis = [];

    public $proyectosInvolucrados = [];
    


    public function mount()
    {
        $this->allPersonas = Personas::where('is_valid','=',1)->orderBy('primer_apellido')->orderBy('segundo_apellido')->get();
        $this->allRevistas = Revistas::where('is_valid','=',1)->orderBy('nombre')->get();
        $this->allProyectos = Proyectos::where('is_valid','=',1)->orderBy('titulo')->get();
        $this->allTesis = Tesis::where('is_valid','=',1)->orderBy('titulo')->get();
    }

    public function addExtraPersona()
    {
        $this->extraPersonas[] = ['primer_nombre' => '', 'primer_apellido' => ''];
    }


    public function removeExtraPersona($indexExtraPersona)
    {
        unset($this->extraPersonas[$indexExtraPersona]);
        $this->extraPersonas = array_values($this->extraPersonas);
    }

    


    
    public function render()
    {
        info($this->extraPersonas);
        info($this->orderProducts);
        return view('livewire.crear.articulos');
    }
}
