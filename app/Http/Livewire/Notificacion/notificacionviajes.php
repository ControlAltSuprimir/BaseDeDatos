<?php

namespace App\Http\Livewire\Notificacion;


use App\Models\Formularioviajes;
use App\Models\Programas;
use App\Models\Proyectos;
use App\Models\Articulos;
use Livewire\Component;

class notificacionviajes extends Component
{
    

    public function render()
    {
        $number = Formularioviajes::where('is_valid','=',1)->where('procesado','=',0)->where('rechazado','=',0)->get()->count();
        return view('livewire.notificacion.viajes',[
            'number' => $number
        ]);
    }
}
