<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    use HasFactory;
    protected $table = 'programas';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 
    


    public function institucion()
    {
        return $this->belongsTo(Instituciones::class,'id_Institucion');
    }

    public function full_nameLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/programas/$this->id\" > {$this->nombre} </a>";
    }

    public function presentacion(){
        return "$this->nombre. " . $this->institucion->nombre . ".";
    }

}
