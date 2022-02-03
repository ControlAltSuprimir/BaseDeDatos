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
        $this->allViajes = Viajes::where('is_Valid', '=', 1)->orderBy('fecha','desc')->get();
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
        //$this->search = $this->product->leParticipante->full_nameLink();
        $this->lesViajes = Viajes::where('id_persona','=',$this->product->id_persona)->where('is_valid', '=', 1)->orderBy('fecha','desc')->get();
        
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
            $this->product->save();
        } else {
            $programa = PersonasProgramas::create($this->product);
            $programa->id_Persona = $this->items;
            $programa->save();
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($productId)
    {
        $product = PersonasProgramas::find($productId);
        if ($product) {
            $product->delete();
        }
    }
}
