<?php

namespace App\Http\Livewire\Editar;

use App\Models\Personas;
use App\Models\Proyectos;
use App\Models\Articulos;
use App\Models\Tesis;
use App\Models\ActividadAcademica;
use App\Models\ActividadExtension;
use Illuminate\Http\Request;
use App\Models\Indexaciones;
use Livewire\Component;


class editarproyecto extends Component
{
    public $orderProducts = [];
    public $orderColaboradores = [];
    public $allPersonas = [];
    public $extraPersonas = [];
    public $allArticulos = [];
    public $allTesis = [];
    public $allAcademica = [];
    public $allExtension = [];


    public $participantes = [];
    public $articulos = [];
    public $tesis = [];
    public $academicas = [];
    public $extensiones =[];

    public $participantesaEditar = [];
    public $investigacionesaEditar = [];
    public $actividades = [];
    public $actividadesaEditar = [];

    public $indices = [];
    public $perfil;
    public $edit;


    public function mount($edit)
    {
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido')->get();
        $this->allArticulos = Articulos::where('is_valid', '=', 1)->orderBy('titulo')->get();
        $this->allTesis = Tesis::where('is_valid', '=', 1)->orderBy('titulo')->get();
        $this->allAcademica = ActividadAcademica::where('is_valid', '=', 1)->orderBy('nombre')->get();
        $this->allExtension = ActividadExtension::where('is_valid', '=', 1)->orderBy('nombre')->get();

        $this->participantes = array('participantes'=>[],'extraparticipantes'=>[]);
        $this->actividades = array('extension' => [], 'academica' => []);

       

        $id = $edit;
        $proyecto = Proyectos::with('responsable')->find($id);
        //$investigador_responsable = Personas::find($proyecto->investigador_responsable);
        // Participantes
        $participantes = $proyecto->participantes()->get();
        //Investigaciones
        $losarticulos = $proyecto->articulos()->get();
        $tesises = $proyecto->tesistas()->get();
        //Actividades
        $lasacademicas = $proyecto->las_academicas()->get();
        $extensiones = $proyecto->las_extensiones()->get();

        //$tablaDeIndexaciones = [];
        //Participantes
        foreach($participantes as $participante) { $this->participantes[] = $participante->id_persona; }
        foreach($losarticulos as $articulo) { $this->articulos[] = $articulo->id; }
        foreach($tesises as $tesis) { $this->tesis[] = $tesis->id; }
        foreach($lasacademicas as $academica) { $this->academicas[] = $academica->id_academica; }
        foreach($extensiones as $extension) { $this->extensiones[] = $extension->id_extension; }

        $this->perfil = $proyecto;
    }





    


    // Render

    public function render()
    {
        info($this->participantes);
        info($this->articulos);
        info($this->tesis);
        info($this->academicas);
        info($this->extensiones);
        
        return view('livewire.editar.proyectos');
    }
}
