<?php

namespace App\Models\parametrizacao\documento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $fillable = ['descricao'];

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }
    

}
