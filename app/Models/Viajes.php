<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Viajes extends Model
{
    use HasFactory;
    protected $table = 'viajes';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 
    /*protected $fillable = [
        'bad_title',
        'bad_author',
        'bad_year',
    ];*/
    public function persona()
    {
        return $this->belongsTo(Personas::class,'id_persona')->orderBy('primer_apellido');
    }

    public function name() //sin persona
    {
        return " [$this->paisOrigen, $this->ciudadOrigen -> $this->paisDestino, $this->ciudadDestino] ($this->fecha)";
    }

    public function full_name() //agregamos el nombre de la persona
    {
        return $this->persona->full_name(). $this->name();
    }

    //proyectos
    public function proyectos()
    {
        return $this->belongsToMany(Proyectos::class, 'viaje_financiacion', 'id_viaje', 'id_proyecto')->whereNotNull('viaje_financiacion.id_proyecto')->where('viaje_financiacion.is_valid', '=', 1);
    }

    //instituciones
    public function institucionesFinanciadoras()
    {
        return $this->belongsToMany(Institucionfinanciadora::class, 'viaje_financiacion', 'id_viaje', 'id_institucion')->whereNotNull('viaje_financiacion.id_institucion')->where('viaje_financiacion.is_valid', '=', 1);
    }

    //academicas
    public function academicas()
    {
        return $this->belongsToMany(ActividadAcademica::class, 'actividad_viaje', 'id_viaje', 'id_academica')->whereNotNull('actividad_viaje.id_academica')->where('actividad_viaje.is_valid', '=', 1);
    }
    
    //extension
    public function extensiones()
    {
        return $this->belongsToMany(ActividadExtension::class, 'actividad_viaje', 'id_viaje', 'id_extension')->whereNotNull('actividad_viaje.id_extension')->where('actividad_viaje.is_valid', '=', 1);
    }

    public function scopeSearch($query, $val)
    {

        return $query->where('ciudadOrigen', 'like', '%' . $val . '%')
            ->orWhere('paisOrigen', 'like', '%' . $val . '%')
            ->orWhere('ciudadDestino', 'like', '%' . $val . '%')
            ->orWhere('paisDestino', 'like', '%' . $val . '%')
            ->orWhere('fecha', 'like', '%' . $val . '%')
            ->orWhereHas('persona', function ($query) use ($val) {
                $query->where(DB::raw('CONCAT_WS(" ", primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)'), 'LIKE', '%' . $val . '%');
            });
    }
}
