<?php

namespace App\Http\Livewire\Crear;

use App\Models\Academicos;
use App\Models\Personas;
use App\Models\Programas;
use App\Models\Proyectos;
use App\Models\Articulos;
use Livewire\Component;

class crearcargos extends Component
{
    public $allAcademicos = [];
    public $allProgramas = [];
    public $allProyectos = [];
    public $allArticulos = [];

    public $programaSeleccionado = NULL;

    public $cotutores = [];
    public $comision = [];
    public $proyectos = [];
    public $articulos = [];
    
    


    public function mount()
    {
        $this->allPersonas = Personas::where('is_valid','=',1)->get();
        $this->allProgramas = Programas::where('is_valid','=',1)->get();
        $this->allProyectos = Proyectos::where('is_valid','=',1)->get();
        $this->allArticulos = Articulos::where('is_valid','=',1)->get();
    }


    public function addItem($type)
    {
        if($type=='cotutores'){
            $this->cotutores[] = "";    
        }
        elseif($type=='comision'){
            $this->comision[] = "";    
        }
        elseif($type=='proyectos'){
            $this->proyectos[] = "";    
        }
        elseif($type=='articulos'){
            $this->articulos[] = "";    
        }
    }

    public function removeItem($index,$type)
    {
        if($type=='cotutores'){
            unset($this->cotutores[$index]);
            $this->cotutores = array_values($this->cotutores);   
        }
        elseif($type=='comision'){
            unset($this->comision[$index]);
            $this->comision = array_values($this->comision);   
        }
        elseif($type=='proyectos'){
            unset($this->proyectos[$index]);
            $this->proyectos = array_values($this->proyectos);   
        }
        elseif($type=='articulos'){
            unset($this->articulos[$index]);
            $this->articulos = array_values($this->articulos);   
        }
    }




    

    public function render()
    {
        return view('livewire.crear.tesis');
    }
}
