<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosTesistas extends Model
{
    use HasFactory;
    protected $table = 'proyectos_tesistas';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public function elProyecto()
    {
        return $this->belongsTo(Proyectos::class, 'id_proyecto');
    }

    public function laTesis()
    {
        return $this->belongsTo(Tesis::class, 'id_tesis');
    }
    
}
