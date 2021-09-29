<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPremio extends Model
{ 
    use HasFactory;
    protected $table = "tipe_premio";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tipo','premio','state'
    ];

    public function Code()
    {
        return $this->hasMany(Code::class,'id_tipo');
    }
     public function Carrera()
    {
        return $this->hasMany(Carrera::class);
    }

}