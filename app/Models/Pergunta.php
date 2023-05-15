<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    protected $fillable = ['massa_maquina', 'motivo_permissao'];

    public function maquinas()
    {
        return $this->belongsToMany(Maquina::class);
    }

}
