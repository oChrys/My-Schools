<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{   
    protected $primaryKey = 'escola_id';
    public $incrementing = true;

    protected $fillable = [
        'name',
        'endereco',
    ];

    public function professores()
    {
        return $this->hasMany(Professor::class);
    }
}
