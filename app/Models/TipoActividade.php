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
}
