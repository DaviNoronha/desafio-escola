<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
}
