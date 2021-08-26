<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;


class Formularioviajes extends Model
{
    use HasFactory;
    protected $table = 'formularioviajes';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function persona()
    {
        return $this->belongsTo(Personas::class, 'id_persona');
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyectos::class, 'id_proyecto');
    }

    public function academica()
    {
        return $this->belongsTo(ActividadAcademica::class, 'id_academica');
    }
    public function extension()
    {
        return $this->belongsTo(ActividadExtension::class, 'id_extension');
    }
    

    
}
