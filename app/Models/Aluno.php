<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';

    protected $fillable = [
        'name',
        'cpf',
        'nascimento',
        'id_professor',
    ];

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'id_professor');
    }
}