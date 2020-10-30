<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Requests\CursoRequest;
use App\Models\Professor;
use App\Services\CursoService;
use App\Services\ProfessorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('cursos.index', [
                'cursos' => CursoService::getAll()          
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('cursos.create', [
                'professores' => ProfessorService::getAll()
            ]);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()

            ]);
            return redirect()->route('cursos.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        try {
            $curso = CursoService::store($request->all(), $request);
            return redirect()->route('cursos.index', $curso->id);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('cursos.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        try {
            if ($curso) {
                return view('cursos.show', [
                    'curso' => $curso
                ]);
            } else {
                return redirect()->action('CursoController@index');
            }
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('cursos.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        try {
            return view('cursos.edit', [
                'curso' => $curso
            ]);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('cursos.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, Curso $curso)
    {
        try {
            CursoService::update($request->all(), $curso);
            return redirect()->route('cursos.index', $curso->id);
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('cursos.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        try {
            CursoService::destroy($curso);
            return redirect()->route('cursos.index');
        } catch (Throwable $th) {
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
            return redirect()->route('cursos.index');
        }
    }
}
