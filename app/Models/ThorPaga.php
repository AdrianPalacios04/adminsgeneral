<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThorPaga extends Model
{
    use HasFactory;
    protected $connection = 'mysql_connect_3';
    protected $table = "tc_thorpaga";
    protected $primaryKey = 'i_id';
    public $timestamps = false;
    protected $fillable = [
        "t_nombre","t_pregunta1","t_respuesta1","t_pregunta2","t_respuesta2",
        "t_pregunta3","t_respuesta3","t_llave1","t_llave2","t_llave3","user_id","pistas_Ax"
    ];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
       public function Carrera()
    {
        return $this->hasMany(Carrera::class);
    }
    public function Carrerat()
    {
        return $this->hasMany(CarreraTotal::class);
    }
}