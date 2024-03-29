<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class ActividadAcademica extends Model
{
    use HasFactory;
    protected $table='actividadacademica';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function proyectos()
    {
        return $this->belongsToMany(Proyectos::class, 'proyecto_academica', 'id_academica', 'id_proyecto')->where('proyecto_academica.is_valid', '=', 1);
    }

    public function participantes()
    {
        return $this->belongsToMany(Personas::class, 'personas_academica', 'id_academica', 'id_persona')->where('personas_academica.is_valid', '=', 1);
    }

    public function viajes()
    {
        return $this->belongsToMany(Viajes::class, 'actividad_viaje', 'id_academica', 'id_viaje')->where('actividad_viaje.is_valid', '=', 1);
    }

    public function institucion_financiadora()
    {
        return $this->belongsTo(Institucionfinanciadora::class,'id_financiamiento')->where('institucionfinanciadora.is_valid','=',1)->withDefault(['nombre' => '']);
    }

    public function enlaces()
    {
        return $this->belongsTo(PersonasActividadesAcademicas::class, 'id_academica')->where('personas_academica.is_valid', '=', 1);
    }

    //Hay que tratar de eliminar esta función por motivos de seguridad
    public function nombre_Link()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/actividadacademica/$this->id\" > {$this->nombre} </a>";
    }

    // Relaciones en cuanto a la financiación

    public function proyectosFinanciantes()
    {
        return $this->belongsToMany(Proyectos::class, 'actividad_financiacion', 'id_academica', 'id_proyecto')->where('actividad_financiacion.is_valid', '=', 1);
    }

    public function institucionesFinanciantes()
    {
        return $this->belongsToMany(Institucionfinanciadora::class, 'actividad_financiacion', 'id_academica', 'id_institucionfinanciadora')->where('actividad_financiacion.is_valid', '=', 1);
    }


    //
    // Otras funciones
    //

    public function intervalo()
    {
        /*return date('Y', strtotime($this->fecha_comienzo)) . "-" . date('Y', strtotime($this->fecha_termino));*/
        return $this->fecha_comienzo . " / " . $this->fecha_termino;
    }

    public function scopeSearch($query, $val)
    {

        return $query->where('nombre', 'like', '%' . $val . '%')
            ->orWhere('tipo', 'like', '%' . $val . '%')
            ->orWhere('participacion', 'like', '%' . $val . '%')
            ->orWhere('fecha_comienzo', 'like', '%' . $val . '%')
            ->orWhere('fecha_termino', 'like', '%' . $val . '%')
            ->orWhereHas('participantes', function ($query) use ($val) {
                $query->where(DB::raw('CONCAT_WS(" ", primer_nombre, segundo_nombre, primer_apellido, segundo_apellido)'), 'LIKE', '%' . $val . '%');
            });;
            
    }
}
