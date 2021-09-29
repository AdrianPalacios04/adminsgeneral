<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = "type_account";

    public $timestamps = false;

    protected $fillable = [
        'account_type'
    ];

    public function Solicitud()
    {
        return $this->hasMany(SolicitudPremio::class);
    }
}
