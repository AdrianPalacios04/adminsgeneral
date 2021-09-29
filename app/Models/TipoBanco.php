<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBanco extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = "type_banking_entity";

    public $timestamps = false;

    protected $fillable = [
        'banking_entity'
    ];

    public function Solicitud()
    {
        return $this->hasMany(SolicitudPremio::class);
    }
}
