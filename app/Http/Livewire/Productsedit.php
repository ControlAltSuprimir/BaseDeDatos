<?php

namespace App\Http\Livewire;

use App\Models\Revistas;
use App\Models\Indexaciones_Revistas;
use Illuminate\Http\Request;
use App\Models\Indexaciones;
use Livewire\Component;

class Productsedit extends Component
{
    public $orderProducts = [];
    public $allProducts = [];
    public $indexacionesAEditar = [];
    public $perfil;
    public $edit;


    public function mount($edit)
    {

        $this->allProducts = Indexaciones::where('is_valid','=',1)->get();

        //////////////////////
        $id=$edit;
        $revista = Revistas::find($id);
        $detalles = $revista->indexacionesDetalles()->get();
        $tablaDeIndexaciones = [];
        foreach($detalles as $detalle)
        {
            $array = array(
                'id' => $detalle->id,
                'id_Indexacion' => $detalle->id_Indexacion,
                'nombre' => Indexaciones::find($detalle->id_Indexacion)->nombre,
                'clasificacionQ' => $detalle->clasificacionQ,
                'impact_factor' => $detalle->impact_factor,
                'observaciones' => $detalle->observaciones,);
            $this->orderProducts[] =$array;
            $this->indexacionesAEditar[] =$array;

        }
        $this->perfil=$revista;
        
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

    public function render()
    {
        
        info($this->orderProducts);
        return view('livewire.productsedit');
    }
}
