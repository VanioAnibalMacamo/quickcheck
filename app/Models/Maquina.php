<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'dataRegisto', 'numero','massa'];

    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class);
    }

    public function perguntas()
    {
        return $this->belongsToMany(Pergunta::class);
    }
}
