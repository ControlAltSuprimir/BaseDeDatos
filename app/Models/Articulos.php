<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Articulos extends Model
{
    use HasFactory;
    protected $table = 'articulos';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function revista()
    {
        return $this->belongsTo(Revistas::class, 'id_Revista')->withDefault([
            'nombre' => '',
        ]);
    }

    public function autores()
    {
        return $this->belongsToMany(Personas::class, 'persona_articulo', 'id_Articulo', 'id_Persona')->where('persona_articulo.is_valid', '=', 1);
    }

    public function proyectos(){
        return $this->belongsToMany(Proyectos::class, 'proyectos_articulos', 'id_articulo', 'id_proyecto')->where('proyectos_articulos.is_valid', '=', 1);
    }

    public function tesistas(){
        return $this->belongsToMany(Tesis::class, 'articulos_tesis', 'id_articulo', 'id_tesis')->where('articulos_tesis.is_valid', '=', 1);
    }

    public function tesistasArray()
    {
        $tesistasArticulo = [];
        foreach($this->tesistas as $tesis){
            $tesistasArticulo[] = $tesis;
        }
        return $tesistasArticulo;
    }

    public function proyectosArray()
    {
        $proyectosArticulo = [];
        foreach($this->proyectos as $proyecto){
            $proyectosArticulo[] = "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/proyectos/$proyecto->id\" >" . $proyecto->titulo . "</a>". '. Responsable del Proyecto: ' . $proyecto->responsable->full_nameLink() . '. ' . $proyecto->tipo_proyecto. '. '  . $proyecto->organizacion_financia .'. ' . $proyecto->intervalo();
        }
        return $proyectosArticulo;
    }

    public function tituloLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/articulos/$this->id\" > {$this->titulo} </a>";
    }

    public function autoresArray()
    {
        $autoresArticulo = [];
        foreach ($this->autores as $autor) {
            $autoresArticulo[] = $autor->full_nameLink();
        }
        return $autoresArticulo;
    }

    public function autoresNoLink()
    {
        $compact = '';
        $autoresArticulo = [];
        foreach ($this->autores as $autor) {
            $autoresArticulo[] = $autor->full_name();
        }
        $compact = implode(". ", $autoresArticulo);

        return $compact;
    }

    public function autoresCompact()
    {
        $compact = '';
        $autoresArticulo = [];
        foreach ($this->autores as $autor) {
            $autoresArticulo[] = $autor->full_nameLink();
        }
        $compact = implode(". ", $autoresArticulo);

        return $compact;
    }


    public function descripcion()
    {
        return "{$this->tituloLink()}."  . implode(', ', $this->autoresArray()) . " {$this->revista->nombre}.";
    }

    public function scopeSearch($query, $val)
    {

        return             $query->where('titulo', 'like', '%' . $val . '%')
        ->orWhere('fecha_publicacion', 'like', '%' . $val . '%')
            ->orWhereHas('revista', function ($query) use ($val) {
                $query->where('nombre', 'LIKE', '%' . $val . '%');
            })
            ->orWhereHas('autores', function ($query) use ($val) {
                $query->where(DB::raw('CONCAT_WS(" ", primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)'), 'LIKE', '%' . $val . '%');
            });
        
    }
}
