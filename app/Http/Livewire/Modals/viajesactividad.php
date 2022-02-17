<?php

namespace App\Http\Livewire\Modals;

use App\Models\Proyectos;
use App\Models\ActividadFinanciacion;
use App\Models\ActividadViaje;
use App\Models\Institucionfinanciadora;
use App\Models\PersonasActividadesAcademicas;
use App\Models\PersonasActividadesExtension;
use App\Models\PersonasProgramas;
use App\Models\Viajes; 
use Livewire\Component;
use Livewire\WithPagination;

class viajesactividad extends Component
{
    use WithPagination;

    public $showModal = false;
    public $showModalDel = false;
    public $productId;
    public $product;

    protected $rules = [
        'product.id_viaje' => 'required|numeric',
        'product.contribucion_financiera'=> ''
    ];

    public $allViajes;
    public $allInstituciones;
    public $lesViajes;
    public $allPersonas;
    public $items = null;
    public $type;
    public $edit;
    public $search;

    public $menu = [];

    public function mount($edit, $type)
    {
        //$this->search = "";
        $this->type = $type;
        $this->allViajes = Viajes::where('is_valid', '=', 1)->get();
        $this->items = $edit;

    }
    public function render()
    {
        return view('livewire.modals.viajesactividad', [
            'products' => ($this->type == 1) ? ActividadViaje::where('is_valid', '=', 1)->whereNotNull('id_viaje')->where('id_academica', '=', $this->items)->latest()->paginate(10) : ActividadViaje::where('is_valid', '=', 1)->whereNotNull('id_viaje')->where('id_extension', '=', $this->items)->latest()->paginate(10)
        ]);
    }


    //Esta función no se está usando en este momento
    public function edit($productId)
    {
        $this->showModal = true;
        $this->productId = $productId;
        $this->product =  ActividadFinanciacion::find($productId);
        
    }


    public function save()
    {
        //$this->product->id_Persona=$this->items;
        $this->validate();

        if (!is_null($this->productId)) {
            //
            $this->product->updated_by = auth()->id();
            $this->product->save();
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($productId)
    {
        $product = ActividadViaje::find($productId);
        if ($product) {
            $product->is_valid=0;
            $product->updated_by = auth()->id();
            $product->save();
        }
    }
}
