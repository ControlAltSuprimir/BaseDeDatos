<?php

namespace App\Http\Livewire\Modals;

use App\Models\Programas;
use App\Models\Articulos;
use App\Models\PersonasActividadesAcademicas;
use App\Models\PersonasActividadesExtension;
use App\Models\PersonasProgramas;
use App\Models\Viajes;
use App\Models\Personas;
use Livewire\Component;
use Livewire\WithPagination;

class participantesactividad extends Component
{
    use WithPagination;

    public $showModal = false;
    public $showModalDel = false;
    public $productId;
    public $product;

    protected $rules = [
        'product.id_persona' => 'required|numeric',
        'product.id_viaje' => '',
        'product.descripcion' => '',
        'product.is_funded' => '',
        //'product.is_valid' => 'required',
    ];

    public $allViajes;
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
        $this->allPersonas = Personas::where('is_valid', '=', 1)->orderBy('primer_apellido')->orderBy('segundo_apellido')->get();
        $this->items = $edit;

    }
    public function render()
    {
        return view('livewire.modals.participantesactividad', [
            'products' => ($this->type == 1) ? PersonasActividadesAcademicas::where('is_valid', '=', 1)->where('id_academica', '=', $this->items)->latest()->paginate(10) : PersonasActividadesExtension::where('is_valid', '=', 1)->where('id_actividad', '=', $this->items)->latest()->paginate(10)
        ]);
    }


    public function edit($productId)
    {
        $this->showModal = true;
        $this->productId = $productId;
        $this->product = ($this->type == 1) ? PersonasActividadesAcademicas::find($productId) : PersonasActividadesExtension::find($productId);        
    }

    public function create()
    {
        //$this->allViajes = Viajes::where('is_Valid', '=', 1)->get();
        $this->search = '';
        $this->showModal = true;
        $this->product = null;
        $this->productId = null;
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
        $product = ($this->type == 1) ? PersonasActividadesAcademicas::find($productId) : PersonasActividadesExtension::find($productId);        
        if ($product) {
            if ($product) {
                $product->is_valid=0;
                $product->updated_by = auth()->id();
                $product->save();
            }
        }
    }
}
