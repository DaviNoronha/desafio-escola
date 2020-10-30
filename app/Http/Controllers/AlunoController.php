<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Services\CursoService;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function matricula(Aluno $aluno)
    {
        return $this->cursos()->attach($aluno, [
            'cursos' => CursoService::getAll()
        ]);
    }

    public function salvarMatricula()
    {
        
    }
}
