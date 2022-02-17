<?php

namespace App\Http\Livewire\Modals\viaje;

use App\Models\ActividadViaje;
use App\Models\Institucionfinanciadora;
use App\Models\Proyectos;
use App\Models\ViajeFinanciacion;
use Livewire\Component;
use Livewire\WithPagination;

class actividadesviaje extends Component
{
    use WithPagination;

    public $showModal = false;
    public $showModalDel = false;
    public $productId;
    public $product;

    protected $rules = [
        'product.id_institucion' => 'required|numeric',
        'product.contribucionfinanciera' => ''
    ];

    
    //public $allActividades;
    public $items = null;
    public $type;
    public $edit;
    public $search;

    public $menu = [];

    public function mount($edit)
    {
        $this->items = $edit;
    }
    public function render()
    {
        $products= [];
        $academicas = ActividadViaje::where('is_valid','=',1)->whereNotNull('id_academica')->where('id_viaje','=',$this->items)->get();
        $extensiones = ActividadViaje::where('is_valid','=',1)->whereNotNull('id_extension')->where('id_viaje','=',$this->items)->get();
        foreach($academicas as $academica){
            $products[]=array(
                'id' => $academica->id_academica,
                'nombre' =>$academica->laAcademica->nombre,
                'tipo' => 'Académica'
            );
        }
        foreach($extensiones as $extension){
            $products[]=array(
                'id' => $extension->id_extension,
                'nombre' =>$extension->laExtension->nombre,
                'tipo' => 'Extensión'
            );
        }
        return view('livewire.modals.viaje.actividadesviaje', [
            'products' => $products
        ]);
    }


    //Esta función no se está usando en este momento

    public function delete($productId)
    {
        $product = ActividadViaje::find($productId);
        if ($product) {
            $product->is_valid = 0;
            $this->product->updated_by = auth()->id();
            $product->save();
        }
    }
}
