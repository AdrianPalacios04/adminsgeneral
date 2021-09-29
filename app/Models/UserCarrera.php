<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCarrera extends Model
{
    use HasFactory;      
    protected $connection = 'mysql_connect_4';
    protected $primaryKey = 'id';
    protected $table = "usuario_carreras";
    
    protected $fillable = [
        'idUsuario','idCarrera','resultado_hora','puesto'
    ];

  public function Carreratotal()
    {
        return $this->belongsTo(CarreraTotal::class,'idCarrera');
    }
   public function Clients()
    {
        return $this->belongsTo(Client::class,'idUsuario');
    }
}