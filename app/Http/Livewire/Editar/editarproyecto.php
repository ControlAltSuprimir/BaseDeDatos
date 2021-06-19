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
        $this->allPersonas = Personas::where('is_valid', '=', 1)->get();
        $this->allArticulos = Articulos::where('is_valid', '=', 1)->get();
        $this->allTesis = Tesis::where('is_valid', '=', 1)->get();
        $this->allAcademicas = ActividadAcademica::where('is_valid', '=', 1)->get();
        $this->allExtensiones = ActividadExtension::where('is_valid', '=', 1)->get();

        $this->participantes = array('coinvestigadores' => [], 'extracoinvestigadores' => [], 'colaboradores' => [], 'extracolaboradores' => []);
        //$this->participantesaEditar = array('coinvestigadores' => [], 'extracoinvestigadores' => [], 'colaboradores' => [], 'extracolaboradores' => []);
        $this->investigaciones = array('articulos' => [], 'tesis' => []);
        //$this->investigacionesaEditar = array('articulos' => [], 'tesis' => []);
        $this->actividades = array('extension' => [], 'academica' => []);
        //$this->actividadesaEditar = array('extension' => [], 'academica' => []);

        $this->indices = array(
            'participantes' => ['coinvestigadores', 'extracoinvestigadores', 'colaboradores', 'extracolaboradores'],
            'investigaciones' => ['articulos', 'tesis'],
            'actividades' => ['extension', 'academica']
        );

        $id = $edit;
        $proyecto = Proyectos::find($id);
        //$investigador_responsable = Personas::find($proyecto->investigador_responsable);
        // Participantes
        $coinvestigadores = $proyecto->coinvestigadores()->get();
        $colaboradores = $proyecto->colaboradores()->get();
        //Investigaciones
        $articulos = $proyecto->articulos()->get();
        $tesises = $proyecto->tesistas()->get();
        //Actividades
        $academicas = $proyecto->las_academicas()->get();
        $extensiones = $proyecto->las_extensiones()->get();

        //$tablaDeIndexaciones = [];

        //Coinvestigadores
        foreach ($coinvestigadores as $coinvestigador) {
            /*$array = array(
                'id' => $coinvestigador->id,
                //'id_Persona' => $coinvestigador->id,
                //'autor' => $coinvestigador->full_name(),
            );*/
            $this->participantes['coinvestigadores'][] = array(
                'id' => $coinvestigador->id
            );
            //$this->participantes['coinvestigadores'][] = $array['id'];
            //$this->participantesaEditar['coinvestigadores'][] = $array;
        }

        //Colaboradores
        foreach ($colaboradores as $colaborador) {
            /*$array = array(
                'id' => $colaborador->id,
                //'id_Persona' => $colaborador->id,
                //'autor' => $colaborador->full_name(),
            );*/
            $this->participantes['colaboradores'][] = array(
                'id' => $colaborador->id
            );
            //$this->participantes['colaboradores'][] = $array['id'];
            //$this->participantesaEditar['colaboradores'][] = $array;
        }

        //Articulos
        foreach ($articulos as $articulo) {
            /*$array = array(
                'id' => $articulo->id,
                //'id_Articulo' => $articulo->id,
                //'titulo' => $articulo->titulo,
            );*/
            $this->investigaciones['articulos'][] = array(
                'id' => $articulo->id
            );
            //$this->investigaciones['articulos'][] = $array['id'];
            //$this->investigacionesaEditar['articulos'][] = $array;
        }

        //Tesis
        foreach ($tesises as $tesis) {
            /*$array = array(
                'id' => $tesis->id,
                //'id_Tesis' => $tesis->id,
                //'titulo' => $tesis->titulo,
            );*/
            $this->investigaciones['tesis'][] = array(
                'id' => $tesis->id
            );
            //$this->investigaciones['tesis'][] = $array['id'];
            //$this->investigacionesaEditar['tesis'][] = $array;
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
