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


    public $participantes = [];
    public $investigaciones = [];
    public $actividades = [];

    public $indices = [];



    public function mount()
    {
        $this->allPersonas = Personas::where('is_valid','=',1)->orderBy('primer_apellido')->get();
        $this->allArticulos = Articulos::where('is_valid','=',1)->orderBy('titulo')->get();
        $this->allTesis = Tesis::where('is_valid','=',1)->get();
        $this->allAcademica = ActividadAcademica::where('is_valid','=',1)->get();
        $this->allExtension = ActividadExtension::where('is_valid','=',1)->get();

        $this->participantes = array(
            'participantes' => [],
            'extraparticipantes' => [],
        );
        $this->investigaciones = array(
            'articulos' => [],
            'tesis' => []
        );
        $this->actividades = array(
            'extension' => [],
            'academica' => []
        );

        $this->indices = array(
            'participantes' => ['participantes','extraparticipantes'],
            'investigaciones' => ['articulos','tesis'],
            'actividades' => ['extension','academica']
        );
    }

    public function addRow($index)
    {
        if(in_array($index,$this->indices['participantes']))
        {
            $this->participantes[$index][] = [];
        }
        elseif(in_array($index,$this->indices['investigaciones']))
        {
            $this->investigaciones[$index][] = [];
        }
        elseif(in_array($index,$this->indices['actividades']))
        {
            $this->actividades[$index][] = [];
        }
        else
        {

        }
    }

    public function removeRow($index, $tipo)
    {
        if(in_array($tipo,$this->indices['participantes']))
        {
            unset($this->participantes[$tipo][$index]);
            $this->participantes[$tipo] = array_values($this->participantes[$tipo]);
        }
        elseif(in_array($tipo,$this->indices['investigaciones']))
        {
            unset($this->investigaciones[$tipo][$index]);
            $this->investigaciones[$tipo] = array_values($this->investigaciones[$tipo]);
        }
        elseif(in_array($tipo,$this->indices['actividades']))
        {
            unset($this->actividades[$tipo][$index]);
            $this->actividades[$tipo] = array_values($this->actividades[$tipo]);
        }
        else
        {

            
        }
        
    }


    // Render

    public function render()
    {
        info($this->participantes);
        info($this->investigaciones);
        info($this->actividades);

        //info($this->orderProducts);
        return view('livewire.crear.proyectos');
    }
}
