<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indexaciones extends Model
{
    use HasFactory;
    protected $table='indexaciones';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 


    public function revistas()
    {
        return $this->belongsToMany(Revistas::class, 'indexaciones_revistas', 'id_Indexacion', 'id_Revista')->where('indexaciones_revistas.is_valid','=','1');
    }
    public function lasRevistas()
    {
        return $this->revistas->count();
    }

    public function nombreLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/indexaciones/$this->id\" > {$this->nombre} </a>";
    }
    public function numeroPublicaciones()
    {
        $publicaciones = 0;
        foreach($this->revistas as $revista)
        {
            $publicaciones += $revista->articulos()->count();
        }
        return $publicaciones;
        //return $this->revistas()->articulos()->count();
    }
}
