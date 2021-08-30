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
    /*protected $fillable = [
        'bad_title',
        'bad_author',
        'bad_year',
    ];*/
    public function persona()
    {
        return $this->belongsTo(Personas::class,'id_Persona')->where('personas.is_valid','=',1)->orderBy('primer_apellido');
    }

    public function full_nameLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/academicos/$this->id\" >{$this->persona->full_name()}</a>";
    }
    /*
    public function row()
    {//class="font-medium text-indigo-600 hover:text-indigo-500"
        //{{ route('tasks.show', $task->id) }}
        return "<td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\"> <a href=\"/academicos/$this->id\" >{$this->persona->primer_nombre} {$this->persona->segundo_nombre} {$this->persona->primer_apellido} {$this->persona->segundo_apellido} </a></td>                                        
        <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-900\"> {$this->carrera}</td>
        <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-900\"> {$this->jerarquia}</td>
        <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-900\"> {$this->persona->rut}</td>                                        
        <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-900\"> {$this->persona->email}</td>";
    }
    */
}
