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
