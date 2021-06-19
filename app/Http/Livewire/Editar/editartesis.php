<?php

namespace App\Http\Livewire\Editar;

use App\Models\Tesis;
use App\Models\TesisInterna;
use App\Models\PersonasTesisTutores;
use App\Models\PersonasTesisComision;
use App\Models\ProyectosTesistas;
use App\Models\ArticulosTesis;
use App\Models\Personas;
use App\Models\Programas;
use App\Models\Proyectos;
use App\Models\Articulos;
use Livewire\Component;

class editartesis extends Component
{
    public $edit;
    public $perfil;
    public $perfilInterno;
    public $tutor;
    public $autor;
    public $programa;

    public $allPersonas = [];
    public $allProgramas = [];
    public $allProyectos = [];
    public $allArticulos = [];

    public $programaSeleccionado = NULL;

    public $cotutores = [];
    public $comision = [];
    public $proyectos = [];
    public $articulos = [];




    public function mount($edit)
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->get();
        $this->allProgramas = Programas::where('is_valid', '=', 1)->get();
        $this->allProyectos = Proyectos::where('is_valid', '=', 1)->get();
        $this->allArticulos = Articulos::where('is_valid', '=', 1)->get();


        //Construyendo el Perfil completo
        $this->perfil = Tesis::find($edit);
        if (in_array($this->perfil->id_programa, [1, 2, 3, 4])) {
            $this->perfilInterno = TesisInterna::where('is_valid', '=', 1)->where('id_tesis', '=', $this->perfil->id)->first();
        }
        $tutorPerfil = PersonasTesisTutores::where('is_valid', '=', 1)->where('id_tesis', '=', $this->perfil->id)->where('tipo', '=', 'Tutor')->first();
        $cotutoresPerfil = PersonasTesisTutores::where('is_valid', '=', 1)->where('id_tesis', '=', $this->perfil->id)->where('tipo', '=', 'Cotutor(a)')->get();
        $comisionPerfil = PersonasTesisComision::where('is_valid', '=', 1)->where('id_tesis', '=', $this->perfil->id)->get();
        $proyectosPerfil = ProyectosTesistas::where('is_valid', '=', 1)->where('id_tesis', '=', $this->perfil->id)->get();
        $articulosPerfil = ArticulosTesis::where('is_valid', '=', 1)->where('id_tesis', '=', $this->perfil->id)->get();

        //asignando los arrays
        $this->programa = $this->perfil->id_programa;
        $this->autor = $this->perfil->autor;
        $this->tutor = $tutorPerfil->id_Persona;
        foreach ($cotutoresPerfil as $cotutor) {
            $this->cotutores[] = $cotutor->id_Persona;
        }
        foreach ($comisionPerfil as $comisionado) {
            $this->comision[] = $comisionado->id_Persona;
        }
        foreach ($proyectosPerfil as $proyecto) {
            $this->proyectos[] = $proyecto->id_proyecto;
        }
        foreach ($articulosPerfil as $articulo) {
            $this->articulos[] = $articulo;
        }
    }


    public function addItem($type)
    {
        if ($type == 'cotutores') {
            $this->cotutores[] = "";
        } elseif ($type == 'comision') {
            $this->comision[] = "";
        } elseif ($type == 'proyectos') {
            $this->proyectos[] = "";
        } elseif ($type == 'articulos') {
            $this->articulos[] = "";
        }
    }

    public function removeItem($index, $type)
    {
        if ($type == 'cotutores') {
            unset($this->cotutores[$index]);
            $this->cotutores = array_values($this->cotutores);
        } elseif ($type == 'comision') {
            unset($this->comision[$index]);
            $this->comision = array_values($this->comision);
        } elseif ($type == 'proyectos') {
            unset($this->proyectos[$index]);
            $this->proyectos = array_values($this->proyectos);
        } elseif ($type == 'articulos') {
            unset($this->articulos[$index]);
            $this->articulos = array_values($this->articulos);
        }
    }

    public function render()
    {
        return view('livewire.editar.tesis');
    }
}
