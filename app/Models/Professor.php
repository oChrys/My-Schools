<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'usuario_id',
        'escola_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}