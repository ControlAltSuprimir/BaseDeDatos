<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'curso';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function full_nameLink()
    {
        return "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/cursos/$this->id\" >{$this->codigo}: {$this->titulo}</a>";
    }

    public function institucion()
    {
        return $this->belongsTo(Instituciones::class,'id_institucion')->where('instituciones.is_valid','=',1);
    }

    public function docentes()
    {
        return $this->belongsToMany(Personas::class, 'cursos_docentes', 'id_curso', 'id_persona')->where('cursos_docentes.is_valid', '=', 1)->pivot('rol','rol');
    }

    public function profes()
    {
        return $this->belongsToMany(Personas::class, 'cursos_docentes', 'id_curso', 'id_persona')->where('cursos_docentes.is_valid', '=', 1)->where('cursos_docentes.rol', '=', 'Docente');
    }

    public function losProfes()
    {
        $compact = '';
        $autoresArticulo = [];
        foreach ($this->profes as $autor) {
            $autoresArticulo[] = $autor->full_nameLink();
        }
        $compact = implode(", ", $autoresArticulo);
        if($compact==''){}
        else{
            $compact=$compact.'.';
        }

        return $compact;
    }

    public function ayudantes()
    {
        return $this->belongsToMany(Personas::class, 'cursos_docentes', 'id_curso', 'id_persona')->where('cursos_docentes.is_valid', '=', 1)->where('cursos_docentes.rol', '=', 'Ayudante');
    }

    public function invitades()
    {
        return $this->belongsToMany(Personas::class, 'cursos_docentes', 'id_curso', 'id_persona')->where('cursos_docentes.is_valid', '=', 1)->where('cursos_docentes.rol', '=', 'Invitado(a)');
    }

    public function alumnos()
    {
        return $this->belongsToMany(Personas::class, 'cursos_alumnos', 'id_curso', 'id_persona')->where('cursos_alumnos.is_valid', '=', 1);
    }

    public function numeroAlumnos()
    {
        $num = $this->alumnos()->count();
        if(isset($num)){
        if(isset($this->alumnos)){
            return max($this->alumnos,$num);
        }
        else
        {
            return max(0,$num);
        }}
        return $this->alumnos;
    }


    public function scopeSearch($query, $val)
    {
        return $query->where('titulo', 'like', '%' . $val . '%')
            ->orWhere('categoria', 'like', '%' . $val . '%')
            ->orWhere('ano', 'like', '%' . $val . '%')
            ->orWhere('codigo', 'like', '%' . $val . '%');
    }
}
