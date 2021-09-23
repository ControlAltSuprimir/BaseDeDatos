<?php

namespace Tests\Feature\Pages;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Articulos;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class ArticulosTest extends TestCase
{


    public function test_example()
    {
        $user = User::find(1);
        Auth::login($user);

        $this->assertTrue(Auth::check());

        $this
            ->call('GET', route('articulos.index'))
            ->assertStatus(200)
            ->assertSee('Artículos')
            ->assertSee('Añadir Artículo');

            $this
            ->call('POST', route('articulos.store'))
            ->assertStatus(200);

        $this
            ->call('GET', route('articulos.create'))
            ->assertStatus(200)
            ->asserSee('Añadir Artículo');

    }

    
    public function  test_articulos()
    {
        $user = User::find(1);
        Auth::login($user);

        $this->get('/articulos')->assertStatus(200);
        $this->get('/articulos/create')->assertStatus(200);
        $articulos = Articulos::where('is_valid', '=', 1)->take(20)->get();
        foreach ($articulos as $articulo) {
            $this
                ->get('/articulos/' . $articulo->id)
                    ->assertStatus(200)
                    ->assertSee($articulo->titulo)
                    ->assertSee($articulo->titulo);
            $this->get('/articulos/' . $articulo->id.'/edit')->assertStatus(200);
        }
    }
    
}
