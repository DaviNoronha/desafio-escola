<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckAdmin;
use App\Http\Requests\UserRequest;
use App\Models\Aluno;
use App\Services\PerfilService;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller
{
    public function index()
    {
        try {
            if (auth()->user()->perfil->nome != 'master') {
                return redirect()->route('home');
            }
            return view('users.index', [
                'users' => UserService::getAll()          
            ]);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->view('home');
        }
    }

    public function create()
    {
        try {
            if (auth()->user()->perfil->nome != 'master') {
                return redirect()->route('home');
            }
            return view('users.create', [
                'perfis' => PerfilService::getAll()
            ]);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('users.index');
        }
    }

    public function store(UserRequest $request)
    {
        try {
            if (auth()->user()->perfil->nome != 'master') {
                return redirect()->route('home');
            }
            $user = UserService::store($request->except('password-repeat'));
            return redirect()->route('users.edit', $user->id);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('users.create');
        }
    }

    public function show(User $user)
    {
        try {
            if (auth()->user()->perfil->nome != 'master') {
                return redirect()->route('home');
            }
            if ($user) {
                return view('users.show', [
                    'user' => $user
                ]);
            } else {
                return redirect()->route('users.index');
            }
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('users.index');
        }
    }

    public function edit(User $user)
    {
        try {
            if (auth()->user()->perfil->nome != 'master') {
                return redirect()->route('home');
            }
            return view('users.edit', [
                'user' => $user
            ]);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('users.index');
        }
    }

    public function update(Request $request, User $user)
    { 
        try { 
            if (auth()->user()->perfil->nome != 'master') {
                return redirect()->route('home');
            }
            UserService::update($request->all(), $user);
            return redirect()->route('users.edit', $user->id);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->back()->withInputs();
        }
    }

    public function destroy(User $user)
    {
        try {
            if (auth()->user()->perfil->nome != 'master') {
                return redirect()->route('home');
            }
            UserService::destroy($user);
            return redirect()->route('users.index');
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('users.index');
        }
    }
    
    public function dados()
    {
        try {
            $user = auth()->user();
            return view('users.dados', [
                'user' => $user
            ]);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public function salvarDados()
    {
        try {
            $user = auth()->user();
            UserService::update($request->all(), auth()->user());
            return redirect()->route('users.dados', $user->id);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}
