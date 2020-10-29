<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Services\ProfessorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProfessorController extends Controller
{

    public function index()
    {
        return view('professores.index', [
            'professores' => ProfessorService::getAll()          
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $professor = ProfessorService::store($request->all());
        return redirect()->route('professores.index', $professor->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        if ($professor) {
            return view('professores.show', [
                'professor' => $professor
            ]);
        } else {
            return redirect()->action('ProfessorController@index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        return view('professores.edit', [
            'professor' => $professor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {
        ProfessorService::update($request->all(), $professor);
        return redirect()->route('professores.index', $professor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        try {
            ProfessorService::destroy($professor);
            return redirect()->route('professores.index');
        } catch (Throwable $th) {
            return redirect()->route('professores.index');
            Log::error([
                'message' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}
