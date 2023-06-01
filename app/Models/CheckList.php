<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'data'];
    
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function actividade()
    {
        return $this->belongsTo(Actividade::class);
    }

    public function maquina()
    {
        return $this->belongsTo(Maquina::class);
    }
}
