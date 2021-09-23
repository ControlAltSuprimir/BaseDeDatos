<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Tesis extends Model
{
    use HasFactory;
    protected $table = 'tesis';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 
    
    public function full_nameLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/tesis/$this->id\" > {$this->titulo} </a>";
    }

    public function proyectos()
    {
        return $this->belongsToMany(Proyectos::class, 'proyectos_tesistas', 'id_tesis', 'id_proyecto')->where('proyectos_tesistas.is_valid', '=', 1);
    }

    public function articulos()
    {
        return $this->belongsToMany(Articulos::class, 'articulos_tesis', 'id_tesis', 'id_articulo')->where('articulos_tesis.is_valid','=',1);
    }

    public function losTutores()
    {
        return $this->belongsToMany(Personas::class, 'personas_tesis_tutores', 'id_tesis', 'id_Persona')->where('personas_tesis_tutores.is_valid', '=', 1);
    }

    public function tutores()
    {
        return $this->hasMany(PersonasTesisTutores::class, 'id_tesis')->where('personas_tesis_tutores.is_valid', '=', 1);
    }

    public function tutor_de_la_tesis()
    {
        foreach($this->tutores as $tutor)
        {
            if($tutor->tipo == 'Tutor'){
                return $tutor->el_tutor();
            }
        }
        return NULL;
    }

    public function cotutores_de_la_tesis()
    {   $tutores=[];
        foreach($this->tutores as $tutor)
        {
            if($tutor->tipo != 'Tutor'){
                $tutores[]= $tutor->el_tutor->full_nameLink();
            }
        }
        return implode(', ',$tutores);
    }

    public function programa()
    {
        return $this->belongsTo(Programas::class,'id_programa')->where('programas.is_valid','=',1);
    }

    public function institucion()
    {
        return $this->belongsTo(Instituciones::class,'id_Institucion')->where('instituciones.is_valid','=',1);
    }

    public function elAutor()
    {
        return $this->belongsTo(Personas::class,'autor')->where('personas.is_valid','=',1);
    }
    public function leAutor(){
        return $this->belongsTo(Personas::class,'autor')->where('personas.is_valid','=',1)->first();
    }

    public function tesista()
    {
        return $this->belongsTo(Personas::class,'autor')->where('personas.is_valid','=',1);
    }

    public function descripcion()
    {
        //return ' ';
        return $this->full_nameLink() . '. Autor: ' . $this->leAutor()->primer_apellido . ' '. $this->leAutor()->segundo_apellido . ', '. $this->leAutor()->primer_nombre . ' ' . $this->leAutor()->segundo_nombre .'. ' . date('Y', strtotime($this->fechaDefensa)) . '.';
    }

    public function otrosProyectos()
    {
        return $this->hasMany(ProyectosTesistas::class, 'id_tesis')->where('is_valid','=',1);
    }


    public function scopeSearch($query, $val)
    {

        return  $query->where('titulo', 'like', '%' . $val . '%')
        ->orWhereHas('losTutores', function ($query) use ($val) {
            $query->where(DB::raw('CONCAT_WS(" ", primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)'), 'LIKE', '%' . $val . '%');
        })
            ->orWhereHas('elAutor', function ($query) use ($val) {
                $query->where(DB::raw('CONCAT_WS(" ", primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)'), 'LIKE', '%' . $val . '%');
            });
            
            
        
    }

}
