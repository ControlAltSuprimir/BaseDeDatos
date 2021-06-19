<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonasProgramas extends Model
{
    use HasFactory;

    protected $table='personas_programas';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 

    public function programa()
    {
        return $this->belongsTo(Programas::class,'id_Programa');
    }

    public function estudio()
    {
        return $this->programa->presentacion();
    }
    public function estadoDelPrograma()
    {
        if($this->estado==1){return "Activo";}
        elseif($this->estado==2){return "Finalizado";}
        elseif($this->estado==3){return "No Terminado";}
        elseif($this->estado==4){return "Congelado";}
    }

    protected $fillable = ['id_Persona', 'id_Programa' , 'fecha_comienzo','fecha_termino','estado', 'distincion','id_programa_de_origen','es_maximo'];

}
