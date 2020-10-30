<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    function professor() 
    {
        return $this->belongsTo(Professor::class);
    }

    function alunos() 
    {
        return $this->belongsToMany(Aluno::class)
            ->withPivot('cursos_alunos')
            ->withTimestamps();
    }
}
