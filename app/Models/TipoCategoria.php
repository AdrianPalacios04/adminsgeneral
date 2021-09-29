<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCategoria extends Model
{
    use HasFactory;

    
    protected $table = "tipo_categoria_reclamo";
    // protected $primaryKey = 'id_categoria';
    public $timestamps = false;

    protected $fillable = [
        'tipo_categoria'
    ];

    public function Reclamo()
    {
        return $this->hasMany(Reclamo::class);
    }
}