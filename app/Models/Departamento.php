<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = ['nome','descricao','sigla'];

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function maquinas()
    {
        return this->hasMany(Maquina::class);
    }

   
}
