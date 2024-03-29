<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucionfinanciadora extends Model
{
    use HasFactory;

    protected $table='institucionfinanciadora';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 
   

    public function actividadesAcademicas()
    {
        return $this->belongsToMany(ActividadAcademica::class, 'actividad_financiacion','id_institucionfinanciadora' , 'id_academica')->where('actividad_financiacion.is_valid', '=', 1);
    }
    
    public function actividadesExtension()
    {
        return $this->belongsToMany(ActividadExtension::class, 'actividad_financiacion','id_institucionfinanciadora' , 'id_extension')->where('actividad_financiacion.is_valid', '=', 1);
    }

}
