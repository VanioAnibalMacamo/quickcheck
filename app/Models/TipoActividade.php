<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoActividade extends Model
{
    use HasFactory;
    
    protected $table = 'tipo_actividades';

    protected $fillable = ['nome', 'descricao'];

    protected $guarded = ['id'];

    public function actividades()
    {
        return $this->hasMany(Actividade::class);
    }
   
    public function perguntas()
    {
        return $this->belongsToMany(Pergunta::class, 'tipo_atividade_pergunta', 'tipo_actividade_id', 'pergunta_id');
    }
}
