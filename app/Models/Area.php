<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['nome','descricao'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
