<?php

namespace App\Http\Livewire\Editar;

use App\Models\Personas;
use App\Models\Revistas;
use App\Models\Articulos;
use App\Models\Proyectos;
use App\Models\Tesis;
use App\Models\ArticulosTesis;
use App\Models\ProyectosArticulos;
use App\Models\Indexaciones_Revistas;
use Illuminate\Http\Request;
use App\Models\Indexaciones;
use Livewire\Component;

class editararticulo extends Component
{
    public $orderProducts = [];
    public $allProducts = [];
    public $indexacionesAEditar = [];
    public $allPersonas = [];
    public $allProyectos = [];
    public $allTesis = [];
    public $extraPersonas = [];
    public $allRevistas = [];
    public $perfil;
    public $edit;

    public $proyectosInvolucrados = [];

    public function mount($edit)
    {
        $this->allTesis = Tesis::where('is_valid', '=', 1)->get();
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->orderBy('titulo')->get();
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido')->get();
        $this->allRevistas = Revistas::where('is_valid', '=', 1)->orderBy('nombre')->get();

        $id = $edit;
        $articulo = Articulos::find($id);
        $detalles = $articulo->autores()->get();
        $losProyectos = $articulo->proyectos()->get();

        foreach ($detalles as $detalle) {
            $this->orderProducts[] = $detalle->id;
        }

        foreach($losProyectos as $elProyecto){
            $this->proyectosInvolucrados[]=$elProyecto->id;

        }
        $this->perfil = $articulo;
    }

    public function addExtraPersona()
    {
        $this->extraPersonas[] = ['primer_nombre' => '', 'primer_apellido' => ''];
    }

    public function addProduct($type)
    {
        if ($type == 'autor') {
            $this->orderProducts[] = "";
        } elseif ($type == 'proyecto') {
            $this->proyectosInvolucrados[] = "";
        }
    }

    public function removeProduct($type, $index)
    {
        if ($type == 'autor') {
            unset($this->orderProducts[$index]);
            $this->orderProducts = array_values($this->orderProducts);
        } elseif ($type == 'proyecto') {
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
        return view('livewire.editar.articulos');
    }
}
