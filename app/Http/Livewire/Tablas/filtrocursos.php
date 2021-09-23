<?php

namespace App\Http\Livewire\Tablas;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Revistas;
use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

use DB;

class filtrocursos extends Component
{
    use WithPagination;

    public $sortBy = 'publicaciones';

    public $sortDirection = 'desc';
    public $perPage = 25;
    public $search = '';
    public $filtro;


    public function render()
    {
        $myArray = [];
        if ($this->filtro['tipo'] == 'ucursos') {
            $encabezado = array(
                0 => 'Nombre',
                1 => 'Período',
                2 => 'Docente',
                3 => 'Alumnos (Aprox)'
            );

            $cursos = Curso::with('profes', 'alumnos')->where('curso.is_valid', '=', 1)
                ->where('u_cursos', '=', 1)
                ->search($this->search)
                ->get();

            foreach ($cursos as $curso) {
                $nombre = (isset($curso->codigo)) ? $curso->codigo . ': ' . $curso->titulo : $curso->titulo;
                $row = array(
                    0 => "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/cursos/$curso->id\" >" .  $nombre . '</a>',
                    1 => $curso->periodo . ' / ' . $curso->ano,
                    2 => $curso->losProfes(),
                    3 => $curso->alumnos,
                );
                $myArray[] = $row;
            }

            //$data = $this->paginate($myArray, $encabezado);

        } elseif ($this->filtro['tipo'] == 'pregrado') {
            $encabezado = array(
                0 => 'Nombre',
                1 => 'Período',
                2 => 'Docente',
                3 => 'Alumnos (Aprox)'
            );
            $cursos = Curso::with('profes', 'alumnos')->where('curso.is_valid', '=', 1)
                ->where('categoria', '=', 'pregrado')
                ->orWhere('categoria', '!=', 'postgrado')
                ->where('id_institucion', '=', 1) //uchile (id=1)
                ->search($this->search)
                ->get();

            foreach ($cursos as $curso) {
                $nombre = (isset($curso->codigo)) ? $curso->codigo . ': ' . $curso->titulo : $curso->titulo;
                if ($curso->is_valid == 1) {
                    $row = array(
                        0 => "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/cursos/$curso->id\" >" .  $nombre . '</a>',
                        1 => $curso->periodo . ' / ' . $curso->ano,
                        2 => $curso->losProfes(),
                        3 => $curso->alumnos,
                    );
                    $myArray[] = $row;
                }
            }

            //$data = $this->paginate($myArray, $encabezado);

        } elseif ($this->filtro['tipo'] == 'postgrado') {
            $encabezado = array(
                0 => 'Nombre',
                1 => 'Período',
                2 => 'Docente',
                //3 => 'Alumnos (aprox)'
            );
            $cursos = Curso::with('profes', 'alumnos')->where('is_valid', '=', 1)
                ->where('categoria', '=', 'postgrado')
                ->where('id_institucion', '=', 1) //uchile (id=1)
                ->search($this->search)
                ->get();

            foreach ($cursos as $curso) {
                if ($curso->is_valid == 1) {
                    $nombre = (isset($curso->codigo)) ? $curso->codigo . ': ' . $curso->titulo : $curso->titulo;
                    $row = array(
                        0 => "<a class=\" whitespace-nowrap text-sm text-gray-900 hover:text-indigo-500\" href=\"/cursos/$curso->id\" >" .  $nombre . '</a>',
                        1 => $curso->periodo . ' / ' . $curso->ano,
                        2 => $curso->losProfes(),
                        //3 => $curso->numeroAlumnos(),
                    );
                    $myArray[] = $row;
                }
            }
        } elseif ($this->filtro['tipo'] == 'otros') {

            $encabezado = array(
                0 => 'Nombre',
                1 => 'Período',
                2 => 'Docente',
                3 => 'Institución'
            );

            $cursos = Curso::with('profes', 'alumnos', 'institucion')->where('is_valid', '=', 1)
                ->where('id_institucion', '!=', 1) //uchile (id=1)
                ->search($this->search)
                ->get();

            foreach ($cursos as $curso) {
                if ($curso->is_valid == 1) {
                    $row = array(
                        0 => $curso->titulo,
                        1 => $curso->periodo . ' / ' . $curso->ano,
                        2 => $curso->losProfes(),
                        3 => $curso->institucion->nombre,
                    );
                    $myArray[] = $row;
                }
            }
        }
        $myArray = $this->paginate($myArray);
        $data = compact('myArray', 'encabezado');
        return view('livewire.tablas.filtrocursos', ['data' => $data]);
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function paginate($items, $perPage = 30, $page = null, $options = [])

    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
