<?php

namespace App\Services;

use App\Models\Curso;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class CursoService 
{

    public static function getAll()
    {
        try {
            return Curso::all();
        } catch (Throwable $th) {
                Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function store(array $dados, Request $request)
    {
        try {
            $file = $request->file('imagem');
            $dados['imagem'] = substr($file->store('public'), '7');
            return Curso::create($dados);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function update(array $dados, Curso $curso)
    {
        try {
            return $curso->update($dados);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function destroy(Curso $curso)
    {
        try {
            return $curso->delete();
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}