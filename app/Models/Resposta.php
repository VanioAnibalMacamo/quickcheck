<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao'];

    protected $foreignKey = 'checklist_id'; // Adicionando a chave estrangeira

    public function checklist()
    {
        return $this->belongsTo(CheckList::class, 'checklist_id'); // Especificando a coluna da chave estrangeira
    }

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }
}
