<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientacion extends Model
{
    use HasFactory;
    protected $table = 'orientacion';
    public $timestamps = false;
    protected $fillable = [
        't_orientacion','id_posicion'
    ];
    // public static function towns($id)
    // {
    //     return Posicion::where('id_posicion','=',$id)->get();
    // }

    public function Posicion()
    {
        return $this->belongsTo(Posicion::class,'id');
    }
}