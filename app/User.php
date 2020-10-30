<?php

namespace App;

use App\Models\Aluno;
use App\Models\Perfil;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function aluno()
    {
        return $this->hasOne(Aluno::class);
    }
}
