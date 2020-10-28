<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Services\CursoService;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        return view('catalogo', [
            'cursos' => CursoService::getAll()
        ]);
    }

}
