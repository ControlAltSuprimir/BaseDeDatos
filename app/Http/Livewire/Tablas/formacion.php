<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Programas;
use App\Models\Articulos;
use App\Models\PersonasProgramas;
use Livewire\Component;
use Livewire\WithPagination;

class Formacion extends Component
{
    use WithPagination;

    public $showModal = false;
    public $showModalDel = false;
    public $productId;
    public $product;

    protected $paginationTheme = 'bootstrap';

    public $designTemplate = 'tailwind';

    protected $rules = [
        'product.id_Programa' => 'required|numeric',
        'product.fecha_comienzo' => '',
        'product.fecha_termino' => '',
        'product.distincion' => '',
        'product.id_programa_de_origen' => '',
        'product.es_maximo' => '',
        'product.estado' => '',
        'product.id_Persona' => '',
        //'product.is_valid' => 'required',
    ];

    public $allProgramas;
    public $items = null;

    public $edit;

    public function mount($edit)
    {
        $this->allProgramas = Programas::with('institucion')->where('is_Valid','=',1)->get();
        $this->items = $edit;
        //$this->product->id_Persona= $this->items;

    }
    public function render()
    {
        
        
        return view('livewire.tablas.formacion', [
            'products' => PersonasProgramas::where('is_valid','=',1)->where('id_Persona','=',$this->items)->latest()->paginate(5)
        ]);
        /*return view('livewire.'.$this->designTemplate.'.products', [
            'products' => Product::latest()->paginate(5)
        ]);
        */
    }

    public function edit($productId)
    {
        $this->showModal = true;
        $this->productId = $productId;
        $this->product = PersonasProgramas::find($productId);
    }

    public function create()
    {
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
            $programa=PersonasProgramas::create($this->product);
            $programa->id_Persona=$this->items;
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
