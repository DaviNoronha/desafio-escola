<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class CatalogoController extends Controller
{
    public function index()
    {
        try {
            $cursos = Curso::paginate(4);
            return view('catalogo', compact('cursos'));
            } catch (Throwable $th) {
                Log::error([
                    'message' => $th->getMessage(),
                    'linha' => $th->getLine(),
                    'arquivo' => $th->getFile()
                ]);
            }
    }

    public function curso(Curso $curso)
    {
        try{
            return view('cursos.show', compact('curso'));
            } catch (Throwable $th) {
                Log::error([
                    'message' => $th->getMessage(),
                    'linha' => $th->getLine(),
                    'arquivo' => $th->getFile()
                ]);
            }
    }
}
