<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Academicos;
use App\Models\ActividadAcademica;
use App\Models\ActividadExtension;
use App\Models\Personas;
use App\Models\Articulos;
use App\Models\Proyectos;
use App\Models\Revistas;
use App\Models\Tesis;

class LogTest extends TestCase
{


    public function test_formularios()
    {
        $this->get('/formularios')->assertStatus(200);
        $this->get('/formularios/viaje')->assertStatus(200);
    }

    public function test_login()
    {
        $this->get('/login')->assertStatus(200);
        $this->get('/forgot-password')->assertStatus(200);
    }

    public function test_academicos()
    {
        $this
            ->get('/academicos')
            ->assertStatus(302)
            ->assertRedirect('/login');

        $this
            ->get('/academicos/create')
            ->assertStatus(302)
            ->assertRedirect('/login');


        $academicos = Academicos::where('is_valid', '=', 1)->get();
        foreach ($academicos as $academico) {
            $this->get('/academicos/' . $academico->id)->assertStatus(302)->assertRedirect('/login');
            $this->get('/academicos/' . $academico->id . '/edit')->assertStatus(302)->assertRedirect('/login');
        }
    }

    public function test_personas()
    {
        $this->get('/personas')->assertStatus(302)->assertRedirect('/login');
        $this->get('/personas/create')->assertStatus(302)->assertRedirect('/login');
        $personas = Personas::where('is_valid', '=', 1)->get()->random(25);
        foreach ($personas as $persona) {
            $academico = Academicos::where('id_Persona', '=', $persona->id)->where('is_valid', '=', 1)->first();
            if (isset($academico->id)) {
                $this->get('/personas/' . $persona->id)->assertStatus(302)->assertRedirect('/login');
                $this->get('/personas/' . $academico->id_Persona)->assertStatus(302)->assertRedirect('/login');
                $this->get('/academicos/' . $academico->id)->assertStatus(302)->assertRedirect('/login');
                $this->get('/academicos/' . $academico->id . '/edit')->assertStatus(302)->assertRedirect('/login');
            } else {
                $this->get('/personas/' . $persona->id)->assertStatus(302)->assertRedirect('/login');
            }
        }
    }
    
    public function  test_articulos()
    {
        $this->get('/articulos')->assertStatus(302)->assertRedirect('/login');
        $this->get('/articulos/create')->assertStatus(302)->assertRedirect('/login');
        $articulos = Articulos::where('is_valid', '=', 1)->get()->random(25);
        foreach ($articulos as $articulo) {
            $this->get('/articulos/' . $articulo->id)->assertStatus(302)->assertRedirect('/login');
            $this->get('/articulos/' . $articulo->id.'/edit')->assertStatus(302)->assertRedirect('/login');
        }
        
        
        $this
            ->call('POST', route('articulos.store'))
            ->assertStatus(302);
            
    }

    public function  test_tesis()
    {
        $this->get('/tesis')->assertStatus(302)->assertRedirect('/login');
        $this->get('/tesis/create')->assertStatus(302)->assertRedirect('/login');
        $tesis = Tesis::where('is_valid', '=', 1)->get()->random(10);
        foreach ($tesis as $latesis) {
            $this->get('/tesis/' . $latesis->id)->assertStatus(302)->assertRedirect('/login');
            $this->get('/tesis/' . $latesis->id.'/edit')->assertStatus(302)->assertRedirect('/login');
        }
    }

    public function  test_proyectos()
    {
        $this->get('/proyectos')->assertStatus(302)->assertRedirect('/login');
        $this->get('/proyectos/create')->assertStatus(302)->assertRedirect('/login');
        $proyectos = Proyectos::where('is_valid', '=', 1)->get();
        foreach ($proyectos as $articulo) {
            $this->get('/proyectos/' . $articulo->id)->assertStatus(302)->assertRedirect('/login');
            $this->get('/proyectos/' . $articulo->id.'/edit')->assertStatus(302)->assertRedirect('/login');
        }
    }

    public function  test_revistas()
    {
        $this->get('/revistas')->assertStatus(302)->assertRedirect('/login');
        $this->get('/revistas/create')->assertStatus(302)->assertRedirect('/login');
        $revistas = Revistas::where('is_valid', '=', 1)->get()->random(30);
        foreach ($revistas as $revista) {
            $this->get('/revistas/' . $revista->id)->assertStatus(302)->assertRedirect('/login');
            $this->get('/revistas/' . $revista->id.'/edit/')->assertStatus(302)->assertRedirect('/login');
        }
    }

    public function  test_actividadAcademica()
    {
        $this->get('/actividadacademica')->assertStatus(302)->assertRedirect('/login');
        $this->get('/actividadacademica/create')->assertStatus(302)->assertRedirect('/login');
        $actividadacademica = ActividadAcademica::where('is_valid', '=', 1)->get();
        foreach ($actividadacademica as $actividad) {
            $this->get('/actividadacademica/' . $actividad->id.'/edit')->assertStatus(302)->assertRedirect('/login');
        }
    }

    public function  test_actividadExtension()
    {
        $this->get('/actividadextension')->assertStatus(302)->assertRedirect('/login');
        $this->get('/actividadextension/create')->assertStatus(302)->assertRedirect('/login');
        $actividadextension = ActividadExtension::where('is_valid', '=', 1)->get();
        foreach ($actividadextension as $extension) {
            $this->get('/actividadextension/' . $extension->id)->assertStatus(302)->assertRedirect('/login');
            $this->get('/actividadextension/' . $extension->id.'/edit')->assertStatus(302)->assertRedirect('/login');
        }
    }
}
