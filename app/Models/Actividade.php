<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
    use HasFactory;

    protected $fillable = ['numero_actividade','dataInicio', 'dataFim'];

    public function funcionarios()
    {
        return $this->belongsToMany(Funcionario::class);
    }

    public function maquinas()
    {
        return $this->belongsToMany(Maquina::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}

