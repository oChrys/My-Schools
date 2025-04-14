<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'nome',
        'cpf',
        'senha',
        'data_nascimento',
        'tipo_usuario',
    ];

    protected $hidden = [
        'senha',
    ];

    public function professor()
    {
        return $this->hasOne(Professor::class);
    }

    public function aluno()
    {
        return $this->hasOne(Aluno::class);
    }
}

