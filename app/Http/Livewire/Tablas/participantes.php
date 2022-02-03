<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Personas;
use App\Models\PersonaProyecto;
use App\Models\Programas;
use App\Models\Articulos;
use App\Models\PersonasProgramas;
use Livewire\Component;
use Livewire\WithPagination;

require(__DIR__ . '/../../../Helpers/PersonaProyecto/menu.php');

class participantes extends Component
{
    use WithPagination;

    public $showModal = false;
    public $showModalDel = false;
    public $productId;
    public $product;

    public $seeModal = false; //ver la participación

    public $items = null;

    protected $rules = [
        'product.id_persona' => 'required|numeric',
        'product.fecha' => '',
        'product.participacion' => '',
        'product.descripcionParticipacion' => '',
        'product.created_by' => '',
        'product.updated_by' => '',
        //'product.id_proyecto' => ''
    ];

    public $allProgramas;
    public $allPersonas;
    

    public $edit;

    

    public function mount($edit)
    {
        $this->allProgramas = Programas::with('institucion')->where('is_Valid','=',1)->get();
        $this->allPersonas = Personas::orderBy('primer_apellido','asc')->orderBy('segundo_apellido','asc')->where('is_valid','=',1)->get();
        $this->items = $edit;
        //$this->product->id_Persona= $this->items;

    }
    public function render()
    {
        
        
        return view('livewire.tablas.participantes', [
            'products' => PersonaProyecto::where('is_valid','=',1)->with('laPersona')->where('id_proyecto','=',$this->items)->latest()->paginate(10)
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
        $this->product = PersonaProyecto::find($productId);
        $this->product->participacion = stringToMenu($this->product->participacion);

    }

    public function create()
    {
        $this->showModal = true;
        $this->product = null;
        $this->productId = null;
    }

    public function save()
    {
        
        //$this->product['participacion'] = menuToString($this->product['participacion']); // cambiar el número a palabra en la db
        $this->validate();
        $this->product['id_proyecto']=$this->items;
        
        if (!is_null($this->productId)) {
            $this->product->participacion = menuToString($this->product->participacion);
            $this->product->updated_by = auth()->id();
            $this->product->save();
        } else {
            $programa=PersonaProyecto::create($this->product);
            //$programa->id_proyecto=$this->items;
            $programa->participacion = menuToString($programa->participacion); // cambiar el número a palabra en la db
            $programa->created_by = auth()->id();
            $programa->updated_by = auth()->id();
            $programa->is_valid=1;
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
        $product = PersonaProyecto::find($productId);
        if ($product) {
            $product->is_valid=0;
            $product->save();
            //$product->delete();
        }
    }
}
