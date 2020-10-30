<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    function cursos()
    {
        return $this->belongsToMany(Curso::class)
            ->withPivot('cursos_alunos')
            ->withTimestamps();
    }
}
