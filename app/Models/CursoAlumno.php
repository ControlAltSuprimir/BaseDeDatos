<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoAlumno extends Model
{
    use HasFactory;

    protected $table = 'cursos_alumnos';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function alumno()
    {
        return $this->belongsTo(Personas::class,'id_persona')->where('personas.is_valid','=',1);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class,'id_curso')->where('curso.is_valid','=',1);
    }

    protected $fillable = ['id_persona', 'nota' , 'asistencia','comentarios','id_curso','created_by','updated_by'];
}
