<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(4);
        return view('catalogo', compact('cursos'));
    }

    public function curso(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }
}
