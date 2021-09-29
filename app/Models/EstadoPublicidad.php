<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPublicidad extends Model
{
    use HasFactory;
    protected $table = 'estado_publicidad';
    public $timestamps = false;
    protected $fillable = [
        'nom_estado'
    ];
    public function Publicidad()
    {
        return $this->hasOne(Publicidad::class);
    }
    
}