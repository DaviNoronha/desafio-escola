<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Models\Professor;
use App\Services\ProfessorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProfessorController extends Controller
{
    public function index()
    {
        try {
            return view('professores.index', [
                'professores' => ProfessorService::getAll()          
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
            return view('professores.create');
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('professores.index');
        }
    }

    public function store(ProfessorRequest $request)
    {
        try {
            $professor = ProfessorService::store($request->all());
            return redirect()->route('professores.index', $professor->id);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('professores.create');
        }
    }

    public function show(int $id)
    {
        try {
            if ($id) {
                return view('professores.show', [
                    'professor' => ProfessorService::getById($id)
                ]);
            } else {
                return redirect()->action('ProfessorController@index');
            }
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('professores.index');
        }
    }

    public function edit(int $id)
    {
        try {
            return view('professores.edit', [
                'professor' => ProfessorService::getById($id)
            ]);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('professores.index');
        }
    }

    public function update(ProfessorRequest $request, int $id)
    {
        try {
            $professor = ProfessorService::getById($id);
            $professor = ProfessorService::update($request->all(), $professor);
            return redirect()->route('professores.index');
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('cursos.edit');
        }
    }

    public function destroy(int $id)
    {
        try {
            $professor = ProfessorService::getById($id);
            ProfessorService::destroy($professor);
            return redirect()->route('professores.index');
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('professores.index');
        }
    }
}
