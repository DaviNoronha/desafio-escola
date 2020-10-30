<?php

namespace App\Services;

use App\Models\Professor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProfessorService 
{

    public static function getAll()
    {
        try {
            return Professor::all();
        } catch (Throwable $th) {
            return redirect()->route('professores.index');
                Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function getById(int $id)
    {
        try {
            return Professor::find($id);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function store(array $dados)
    {
        try {
            return Professor::create($dados);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function update(array $dados, Professor $professor)
    {
        try {
            return $professor->update($dados);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function destroy(Professor $professor)
    {
        try {
            return $professor->delete();
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}