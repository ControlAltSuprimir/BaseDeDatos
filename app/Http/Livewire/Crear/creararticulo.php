<?php

namespace App\Http\Livewire\Crear;


use App\Models\Personas;
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

    public $proyectosInvolucrados = [];
    


    public function mount()
    {
        $this->allPersonas = Personas::where('is_valid','=',1)->orderBy('primer_apellido')->get();
        $this->allRevistas = Revistas::where('is_valid','=',1)->orderBy('nombre')->get();
        $this->allProyectos = Proyectos::where('is_valid','=',1)->orderBy('titulo')->get();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function addExtraPersona()
    {
        $this->extraPersonas[] = ['primer_nombre' => '', 'primer_apellido' => ''];
    }

    public function addProduct($type)
    {
        if($type=='autor'){
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
        }
        elseif($type=='proyecto'){
            $this->proyectosInvolucrados[]=[];
        }
    }

    public function removeProduct($type,$index)
    {
        if($type=='autor'){
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
        }
        elseif($type=='proyecto'){
            unset($this->proyectosInvolucrados[$index]);
        $this->proyectosInvolucrados = array_values($this->proyectosInvolucrados);
        }
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
