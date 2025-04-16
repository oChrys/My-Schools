<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'cpf',
        'senha',
        'nascimento',
        'tipo_usuario',
    ];

    protected $hidden = [
        'senha',
    ];

    public function professor()
    {
        return $this->hasOne(Professor::class, 'user_id');
    }

    public function aluno()
    {
        return $this->hasOne(Aluno::class);
    }
    public function getAuthPassword()
    {
        return $this->senha;
    }
    public function getAuthIdentifierName()
    {
        return 'cpf';   
    }
}

