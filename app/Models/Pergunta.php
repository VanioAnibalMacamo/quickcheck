<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    protected $fillable = ['descricao','finalidade'];

    public function maquinas()
    {
        return $this->belongsToMany(Maquina::class);
    }

    public function tipoActividades()
    {
        return $this->belongsToMany(TipoActividade::class);
    }


}
