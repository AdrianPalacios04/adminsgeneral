<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posicion extends Model
{
    use HasFactory;
    protected $table = 'posicion';
    public $timestamps = false;
    protected $fillable = [
        't_posicion'
    ];

    public function Orientacion()
    {
        return $this->hasMany(Orientacion::class,'id_posicion');
    }
}