<?php

namespace App\Services;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class PerfilService 
{
    public static function getAll()
    {
        try {
            return Perfil::all();
        } catch (Throwable $th) {
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
            return Perfil::find($id);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }  
}