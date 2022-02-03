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
    public $allPersonas = [];
    public $allProyectos = [];
    public $allTesis = [];
    public $extraPersonas = [];
    public $allRevistas = [];
    public $perfil;
    public $edit;

    public $autores;
    public $proyectos;
    public $tesistas;

    public function mount($edit)
    {
        $this->allTesis = Tesis::where('is_valid', '=', 1)->get();
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->orderBy('titulo')->get();
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido')->get();
        $this->allRevistas = Revistas::where('is_valid', '=', 1)->orderBy('nombre')->get();

        $id = $edit;
        $this->perfil = Articulos::find($id);

        $this->autores = $this->perfil->autores()->get();
        $this->proyectos = $this->perfil->proyectos()->get();
        $this->tesistas = $this->perfil->tesistas()->get();

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
        return view('livewire.editar.articulos');
    }
}
