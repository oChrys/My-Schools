<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'user_id',
        'escola_id',
    ];

    public static function booted(){
        static::deleting(function ($professor){
            if($professor->user && $professor->user->exists){
                $professor->user->delete();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class, 'escola_id', 'escola_id');
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}