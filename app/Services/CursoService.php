<?php

namespace App\Services;

use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class CursoService {

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