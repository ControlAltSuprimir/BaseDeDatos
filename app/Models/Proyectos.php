<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;


class Proyectos extends Model
{
    use HasFactory;
    protected $table = 'proyectos';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function responsable()
    {
        return $this->belongsTo(Personas::class, 'investigador_responsable')->withDefault([
            'nombre' => '',
        ]);
    }
    public function intervalo()
    {
        return date('Y', strtotime($this->comienzo)) . "-" . date('Y', strtotime($this->termino));
    }

    public function tituloLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/proyectos/$this->id\" > {$this->titulo} </a>";
    }

    public function articulos()
    {
        return $this->belongsToMany(Articulos::class, 'proyectos_articulos', 'id_proyecto', 'id_articulo')->where('proyectos_articulos.is_valid', '=', 1);
    }

    public function coinvestigadores()
    {
        return $this->belongsToMany(Personas::class, 'proyectos_personas_coinvestigadores', 'id_proyecto', 'id_persona')->where('proyectos_personas_coinvestigadores.is_valid', '=', 1);
    }

    public function colaboradores()
    {
        return $this->belongsToMany(Personas::class, 'proyectos_personas_colaboradores', 'id_proyecto', 'id_persona')->where('proyectos_personas_colaboradores.is_valid', '=', 1);
    }

    public function tesistas()
    {
        return $this->belongsToMany(Tesis::class, 'proyectos_tesistas', 'id_proyecto', 'id_tesis')->where('proyectos_tesistas.is_valid', '=', 1);
    }

    public function extensiones()
    {
        return $this->belongsToMany(ActividadExtension::class, 'proyecto_extension', 'id_proyecto', 'id_actividad')->where('proyecto_extension.is_valid', '=', 1);
    }

    public function las_extensiones()
    {
        return $this->hasMany(ProyectosActividadesExtension::class, 'id_proyecto');
    }

    public function academicas()
    {
        return $this->belongsToMany(ActividadAcademica::class, 'proyecto_academica', 'id_proyecto', 'id_academica')->where('proyecto_academica.is_valid', '=', 1);
    }

    public function las_academicas()
    {
        return $this->hasMany(ProyectosActividadesAcademicas::class, 'id_proyecto');
    }

    public function participantes()
    {
        return $this->hasMany(PersonaProyecto::class, 'id_proyecto')->where('is_valid','=',1);
    }


    public function viajes()
    {
        return $this->belongsToMany(Viajes::class, 'proyecto_viajes', 'id_proyecto', 'id_viaje')->where('proyecto_viajes.is_valid', '=', 1);
    }

    public function full_name(){
        return "$this->codigo_proyecto : $this->titulo (Responsable: " . $this->responsable->full_name() . " )";
    }

    public function autoresArray()
    {
        $autoresArticulo = [];
        foreach ($this->autores as $autor) {
            $autoresArticulo[] = $autor->full_nameLink();
        }
        return $autoresArticulo;
    }

    public function autoresCompact()
    {
        $compact = '';
        $autoresProyecto = [];
        foreach ($this->coinvestigadores as $autor) {
            $autoresArticulo[] = $autor->full_nameLink();
        }
        $compact = implode(", ", $autoresProyecto);

        return $compact;
    }


    public function descripcion()
    {
        return "{$this->tituloLink()}."  . implode(', ', $this->autoresArray()) . " {$this->revista->nombre}.";
    }

    public function scopeSearch($query, $val)
    {

        return $query->where('titulo', 'like', '%' . $val . '%')
            ->orWhere('comienzo', 'like', '%' . $val . '%')
            ->orWhere('termino', 'like', '%' . $val . '%')
            ->orWhereHas('responsable', function ($query) use ($val) {
                $query->where(DB::raw('CONCAT_WS(" ", primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)'), 'LIKE', '%' . $val . '%');
            })
            ->orWhereHas('coinvestigadores', function ($query) use ($val) {
                $query->where(DB::raw('CONCAT_WS(" ", primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)'), 'LIKE', '%' . $val . '%');
            });
    }

    
}
