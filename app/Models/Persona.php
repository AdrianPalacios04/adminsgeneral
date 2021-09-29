<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $connection = 'mysql_connect_4';
    protected $table = "tc_persona";
    protected $primaryKey = 'i_idpersona';
    public $timestamps = false;

    protected $fillable = [
        'c_dniper','t_nombreper','t_apellidoper','d_nacimientoper'
    ];
    
    public function Client()
    {   
        return $this->hasOne(Client::class,'i_idpersona');
    }
}