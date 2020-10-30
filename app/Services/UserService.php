<?php

namespace App\Services;

use App\Models\Aluno;
use App\User;
use App\Services\PerfilService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserService 
{
    public static function getAll() 
    {
        try {
            return User::all();
        } catch (Throwable $th) {
            return redirect()->route('users.index');
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
            $perfil = PerfilService::getById($dados['perfil_id']);
            $dados['password'] = bcrypt($dados['password']);
            $user = User::create($dados);
            if ($perfil->nome == 'aluno') {
                Aluno::create([
                    'user_id' => $user->id
                ]);
            }
            return $user;
        } catch (Throwable $th) {
            Log::error([
            'message' => $th->getMessage(),
            'linha' => $th->getLine(),
            'arquivo' => $th->getFile()
        ]);
    }
}

    public static function update(array $dados, User $user)
    {
        try {
            if ($user->perfil->nome == 'aluno') {
                $user->aluno->update([
                    'data_nascimento' => $dados['data_nascimento'] ?? null,
                    'biografia' => $dados['biografia'] ?? null,
                    'telefone' => $dados['telefone'] ?? null,
                    'cpf' => $dados['cpf'] ?? null
                ]);
            }
            $user->update([
                'nome' => $dados['nome'],
                'email' => $dados['email']
            ]);
        } catch (Throwable $th) {
            Log::error([
            'message' => $th->getMessage(),
            'linha' => $th->getLine(),
            'arquivo' => $th->getFile()
        ]);
    }
}

    public static function destroy(User $user)
    {
        try {
            if ($user->perfil->nome == 'aluno') {
                $user->aluno->delete();
            }
            return $user->delete();
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
    
}