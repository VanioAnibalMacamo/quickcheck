<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    public function checklist()
    {
        return $this->belongsTo(CheckList::class);
    }

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }

}
