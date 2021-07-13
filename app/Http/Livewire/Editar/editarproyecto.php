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
    public $allAcademicas = [];
    public $allExtensiones = [];


    public $participantes = [];
    public $participantesaEditar = [];
    public $investigaciones = [];
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
        $this->allAcademicas = ActividadAcademica::where('is_valid', '=', 1)->get();
        $this->allExtensiones = ActividadExtension::where('is_valid', '=', 1)->get();

        $this->participantes = array('participantes'=>[],'extraparticipantes'=>[]);
        $this->actividades = array('extension' => [], 'academica' => []);

        $this->indices = array(
            'participantes' => ['participantes','extraparticipantes'],
            'investigaciones' => ['articulos', 'tesis'],
            'actividades' => ['extension', 'academica']
        );

        $id = $edit;
        $proyecto = Proyectos::find($id);
        //$investigador_responsable = Personas::find($proyecto->investigador_responsable);
        // Participantes
        $participantes = $proyecto->participantes()->get();
        //Investigaciones
        $articulos = $proyecto->articulos()->get();
        $tesises = $proyecto->tesistas()->get();
        //Actividades
        $academicas = $proyecto->las_academicas()->get();
        $extensiones = $proyecto->las_extensiones()->get();

        //$tablaDeIndexaciones = [];
        //Participantes
        foreach ($participantes as $participante) {
            $this->participantes['participantes'][] = array(
                'id' => $participante->id_persona,
                'rol' => $participante->participacion,
                'fecha' => $participante->fecha,
                'descripcion' => $participante->descripcionParticipacion
            );
            
        }

        //Articulos
        foreach ($articulos as $articulo) {
            $this->investigaciones['articulos'][] = array(
                'id' => $articulo->id
            );
        }

        //Tesis
        $this->investigaciones['tesis']=[];
        foreach ($tesises as $tesis) {
            $this->investigaciones['tesis'][] = array(
                'id' => $tesis->id
            );
        }

        //Actividades Académicas
        foreach ($academicas as $academica) {
            $this->actividades['academica'][] = array(
                'id' => $academica->id_academica,
                'cargo' => $academica->cargo
            );
        }

        //Actividades Extensión
        foreach ($extensiones as $extension) {
            $this->actividades['extension'][] = array(
                'id' => $extension->id_actividad,
                'cargo' => $extension->cargo,
                'objeto' => $extension
            );
        }



        $this->perfil = $proyecto;
    }

    public function addRow($index)
    {
        if (in_array($index, $this->indices['participantes'])) {
            $this->participantes[$index][] = '';
            //$this->participantesaEditar[$index][] = '';
        } elseif (in_array($index, $this->indices['investigaciones'])) {
            $this->investigaciones[$index][] = '';
            //$this->investigacionesaEditar[$index][] = '';
        } elseif (in_array($index, $this->indices['actividades'])) {
            $this->actividades[$index][] = '';
            //$this->actividadesaEditar[$index][] = '';
        } else {
        }
    }

    public function removeRow($index, $tipo)
    {
        if (in_array($tipo, $this->indices['participantes'])) {
            unset($this->participantes[$tipo][$index]);
            $this->participantes[$tipo] = array_values($this->participantes[$tipo]);
            /*
            unset($this->participantesaEditar[$tipo][$index]);
            $this->participantesaEditar[$tipo] = array_values($this->participantesaEditar[$tipo]);*/
        } elseif (in_array($tipo, $this->indices['investigaciones'])) {
            unset($this->investigaciones[$tipo][$index]);
            $this->investigaciones[$tipo] = array_values($this->investigaciones[$tipo]);
            /*
            unset($this->investigaciones[$tipo][$index]);
            $this->investigacionesaEditar[$tipo] = array_values($this->investigacionesaEditar[$tipo]);*/
        } elseif (in_array($tipo, $this->indices['actividades'])) {
            unset($this->actividades[$tipo][$index]);
            $this->actividades[$tipo] = array_values($this->actividades[$tipo]);
            /*
            unset($this->actividadesaEditar[$tipo][$index]);
            $this->actividadesaEditar[$tipo] = array_values($this->actividadesaEditar[$tipo]);*/
        } else {
        }
    }


    // Render

    public function render()
    {
        info($this->participantes);
        info($this->investigaciones);
        info($this->actividades);

        //info($this->orderProducts);
        return view('livewire.editar.proyectos');
    }
}
