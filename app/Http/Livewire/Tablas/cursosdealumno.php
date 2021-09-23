<?php

namespace App\Http\Livewire\Tablas;

use App\Models\Programas;
use App\Models\Articulos;
use App\Models\Curso;
use App\Models\CursoAlumno;
use App\Models\PersonasProgramas;
use Livewire\Component;
use Livewire\WithPagination;

class cursosdealumno extends Component
{
    use WithPagination;

    public $showModal = false;
    public $showModalDel = false;
    public $productId;
    public $product;

    protected $paginationTheme = 'bootstrap';

    public $designTemplate = 'tailwind';

    protected $rules = [
        'product.id_curso' => 'required|numeric',
        'product.nota' => '',
        'product.asistencia' => '',
        'product.comentarios' => '',
        'product.id_persona' => '',
        'product.created_by' => '',
        'product.updated_by' => '',
    ];

    public $allCursos;
    public $items = null;

    public $edit;
    public $auth=null;

    public function mount($edit)
    {
        $this->allCursos = Curso::with('institucion')->where('is_valid','=',1)->orderBy('titulo','asc')->orderBy('ano','desc')->get();
        $this->items = $edit;
        $this->auth = auth()->id();
        //$this->product->id_Persona= $this->items;

    }
    public function render()
    {
        
        
        return view('livewire.tablas.cursodealumno', [
            'products' => CursoAlumno::where('is_valid','=',1)->where('id_persona','=',$this->items)->latest()->paginate(30)
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
        $this->product = CursoAlumno::find($productId);
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
            $this->product->updated_by = $this->auth;
            $this->product->is_valid=1;
            $this->product->save();
        } else {
            $this->product['id_persona']=$this->items;
            $this->product['created_by']=$this->auth;
            $this->product['updated_by']=$this->auth;
            
            $estudiante=CursoAlumno::create($this->product);
            $estudiante->id_persona=$this->items;
            //$estudiante->updated_by=auth()->id();
            $estudiante->save();
        }
        $this->showModal = false;

    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($productId)
    {
        $estudiante = CursoAlumno::find($productId);
        if ($estudiante) {
            $estudiante->updated_by=auth()->id();
            $estudiante->is_valid=0;
            $estudiante->save();
        }
    }
}
