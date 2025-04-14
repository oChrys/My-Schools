<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = [
        'escola_id',
        'nome',
        'endereco',
    ];

    public function professores()
    {
        return $this->hasMany(Professor::class);
    }
}
