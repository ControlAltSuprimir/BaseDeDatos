<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academicos extends Model
{

    use HasFactory;
    protected $table = 'academicos';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 
    

    public function persona()
    {
        return $this->belongsTo(Personas::class,'id_Persona')->where('personas.is_valid','=',1)->orderBy('primer_apellido');
    }

    public function full_nameLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/academicos/$this->id\" >{$this->persona->full_name()}</a>";
    }
   
    
}
