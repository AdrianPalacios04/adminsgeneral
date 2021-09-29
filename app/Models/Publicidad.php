<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    protected $table = 'publicidad';
    public $timestamps = false;
  
    use HasFactory;
     protected $fillable = [
        'nombre','imagen','link','f_inicio','f_final','id_estado',
        'id_posicion','id_orientacion','id_pagina'
    ];
    public function Pagina()
    {
        return $this->belongsTo(Pagina::class,'id_pagina');
    }
    public function Estado()
    {
        return $this->belongsTo(EstadoPublicidad::class,'id_estado');
    }

}