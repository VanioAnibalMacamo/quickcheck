<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
    use HasFactory;

    protected $fillable = ['nome','descricao'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function tipoActividade()
    {
        return $this->belongsTo(TipoActividade::class);
    }

    public function checklists()
    {
        return $this->hasMany(CheckList::class);
    }
}

