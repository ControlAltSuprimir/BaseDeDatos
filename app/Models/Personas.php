<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Personas extends Model
{
    use HasFactory;

    protected $table='personas';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 

    public function academico()
    {
        return $this->hasOne(Academico::class,'id_Persona');
    }

    
    public function full_nameInformal()
    {
        return "$this->primer_nombre $this->segundo_nombre $this->primer_apellido $this->segundo_apellido";
    }
    public function full_name()
    {
        return "$this->primer_apellido $this->segundo_apellido, $this->primer_nombre $this->segundo_nombre";
    }

    public function full_nameLinkInformal()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/personas/$this->id\" >{$this->full_nameInformal()}</a>";
    }

    public function full_nameLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/personas/$this->id\" >{$this->full_name()}</a>";
    }

    public function articulos()
    {
        return $this->belongsToMany(Articulo::class, 'persona_articulo', 'id_Persona', 'id_Articulo');
    }

    public function reponsableProyecto()
    {
        return $this->hasMany(Proyectos::class, 'investigador_responsable');
    }

    public function coinvestigadorProyecto()
    {
        return $this->belongsToMany(Proyectos::class, 'proyectos_personas_coinvestigadores', 'id_persona', 'id_proyecto');
    }

    public function colaboradorProyecto()
    {
        return $this->belongsToMany(Proyectos::class, 'proyectos_personas_colaboradores', 'id_persona', 'id_proyecto');
    }

    public function programas()
    {
        return $this->hasMany(PersonasProgramas::class, 'id_Persona');
    }



    public function scopeSearch($query, $val)
    {

        return $query->where(DB::raw('CONCAT_WS(" ", primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)'), 'like', '%' . $val . '%');
        /*
        $query->where('titulo', 'like', '%' . $val . '%')
        ->orWhere('fecha_publicacion', 'like', '%' . $val . '%')
            ->orWhereHas('revista', function ($query) use ($val) {
                $query->where('nombre', 'LIKE', '%' . $val . '%');
            })
            ->orWhereHas('autores', function ($query) use ($val) {
                $query->where(DB::raw('CONCAT_WS(" ", primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)'), 'LIKE', '%' . $val . '%');
            });
        */
        
    }
}
