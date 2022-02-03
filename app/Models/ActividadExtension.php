<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class ActividadExtension extends Model
{
    use HasFactory;

    protected $table='actividadextension';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 


    
    public function proyectos()
    {
        return $this->belongsToMany(Proyectos::class, 'proyecto_extension', 'id_actividad', 'id_proyecto')->where('proyecto_extension.is_valid', '=', 1);
    }

    public function participantes()
    {
        return $this->belongsToMany(Personas::class, 'personas_extension', 'id_actividad', 'id_persona')->where('personas_extension.is_valid', '=', 1)->withPivot('cargo','cargo');
    }

    public function viajes()
    {
        return $this->belongsToMany(Viajes::class, 'personas_extension', 'id_extension', 'id_viaje')->where('personas_extension.is_valid', '=', 1);
    }

    public function institucion_financiadora()
    {
        return $this->belongsTo(Institucionfinanciadora::class,'id_financiamiento')->where('institucionfinanciadora.is_valid','=',1)->withDefault(['nombre' => '']);
    }

    public function personas_extension()
    {
        return $this->hasMany(PersonasExtension::class, 'id_actividad');
    }

    public function enlaces()
    {
        return $this->belongsTo(PersonasActividadesExtension::class, 'id_academica')->where('personas_extension.is_valid', '=', 1);
    }

    public function nombre_Link()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/actividadextension/$this->id\" > {$this->nombre} </a>";
    }

    public function intervalo()
    {
        /*return date('Y', strtotime($this->fecha_comienzo)) . "-" . date('Y', strtotime($this->fecha_termino));*/
        return $this->fecha_comienzo . " / " . $this->fecha_termino;
    }

    public function scopeSearch($query, $val)
    {

        return $query->where('nombre', 'like', '%' . $val . '%')
            ->orWhere('tipo', 'like', '%' . $val . '%')
            ->orWhere('numeroParticipantes', 'like', '%' . $val . '%')
            ->orWhere('fecha_comienzo', 'like', '%' . $val . '%')
            ->orWhere('fecha_termino', 'like', '%' . $val . '%')
            ->orWhereHas('participantes', function ($query) use ($val) {
                $query->where(DB::raw('CONCAT_WS(" ", primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)'), 'LIKE', '%' . $val . '%');
            });
            
    }


}
