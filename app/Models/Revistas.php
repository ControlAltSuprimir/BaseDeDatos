<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revistas extends Model
{
    use HasFactory;
    protected $table = 'revistas';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function full_nameLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/revistas/$this->id\" > {$this->nombre} </a>";
    }
    public function aliasLink()
    {
        if(isset($this->alias))
        {
            return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/revistas/$this->id\" > {$this->alias} </a>";
        }
        else
        {
            return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/revistas/$this->id\" > {$this->nombre} </a>";
        }
    }

    public function articulos()
    {
        return $this->hasMany(Articulos::class, 'id_Revista');
    }
    public function numeroPublicaciones()
    {
        return $this->articulos->count();
    }

    public function fondecytQ(){
        $clasificaciones=['R','B','MB','R/B/MB*','MB/B*'];
        if ($this->Fondecyt == 1 && in_array($this->clasificacion_Fondecyt, $clasificaciones))
        {
            return $this->clasificacion_Fondecyt;
        }
        return "No Clasificada";
    }

    public function indexaciones()
    {
        return $this->belongsToMany(Indexaciones::class, 'indexaciones_revistas', 'id_Revista', 'id_Indexacion')->where('indexaciones_revistas.is_valid','=',1);
    }

    public function lasIndexaciones()
    {
        $array=[];
        foreach($this->indexaciones as $indexacion)
        {
            $array[]=$indexacion->nombre;
        }
        return implode(', ',$array);
    }

    public function lasIndexacionesLink()
    {
        $array=[];
        foreach($this->indexaciones as $indexacion)
        {
            $array[]=$indexacion->nombreLink();
        }
        return implode(', ',$array);
    }

    public function indexacionesDetalles()
    {
        return $this->hasMany(Indexaciones_Revistas::class,'id_Revista','id')->where('is_valid','=','1');
    }


    public function scopeSearch($query, $val)
    {

        return             $query->where('nombre', 'like', '%' . $val . '%')
            ->orWhereHas('indexaciones', function ($query) use ($val) {
                $query->where('nombre', 'LIKE', '%' . $val . '%');
            });
    }
    
}
