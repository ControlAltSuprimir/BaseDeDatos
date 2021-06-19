<?php

namespace App\Http\Livewire\Crear;


use App\Models\Personas;
use App\Models\Revistas;
use Livewire\Component;

class creararticulo extends Component
{
    public $orderProducts = [];
    public $allPersonas = [];
    public $extraPersonas = [];
    public $allRevistas = [];
    


    public function mount()
    {
        $this->allPersonas = Personas::where('is_valid','=',1)->get();
        $this->allRevistas = Revistas::where('is_valid','=',1)->get();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function addExtraPersona()
    {
        $this->extraPersonas[] = ['primer_nombre' => '', 'primer_apellido' => ''];
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function removeExtraPersona($indexExtraPersona)
    {
        unset($this->extraPersonas[$indexExtraPersona]);
        $this->extraPersonas = array_values($this->extraPersonas);
    }

    public function render()
    {
        info($this->extraPersonas);
        info($this->orderProducts);
        return view('livewire.crear.articulos');
    }
}
