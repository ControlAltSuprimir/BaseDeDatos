<?php

namespace App\Http\Livewire\Modals;

use App\Models\Proyectos;
use App\Models\ActividadFinanciacion;
use App\Models\Institucionfinanciadora;
use App\Models\PersonasActividadesAcademicas;
use App\Models\PersonasActividadesExtension;
use App\Models\PersonasProgramas;
use App\Models\Viajes;
use App\Models\Personas;
use App\Models\ProyectosActividadesAcademicas;
use Livewire\Component;
use Livewire\WithPagination;

class institucionesactividad extends Component
{
    use WithPagination;

    public $showModal = false;
    public $showModalDel = false;
    public $productId;
    public $product;

    protected $rules = [
        'product.id_institucionfinanciadora' => 'required|numeric',
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
        $this->allInstituciones = Institucionfinanciadora::where('is_valid', '=', 1)->get();
        $this->items = $edit;

    }
    public function render()
    {
        return view('livewire.modals.institucionesactividad', [
            'products' => ($this->type == 1) ? ActividadFinanciacion::where('is_valid', '=', 1)->whereNotNull('id_institucionfinanciadora')->where('id_academica', '=', $this->items)->latest()->paginate(10) : ActividadFinanciacion::where('is_valid', '=', 1)->whereNotNull('id_institucionfinanciadora')->where('id_extension', '=', $this->items)->latest()->paginate(10)
        ]);
    }


    public function edit($productId)
    {
        $this->showModal = true;
        $this->productId = $productId;
        $this->product =  ActividadFinanciacion::find($productId);
        
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
        $product = ActividadFinanciacion::find($productId);
        if ($product) {
            $product->is_valid=0;
            $product->updated_by = auth()->id();
            $product->save();
        }
    }
}
